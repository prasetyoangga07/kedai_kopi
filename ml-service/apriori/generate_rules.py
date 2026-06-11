import pandas as pd
import json
from database import engine
from mlxtend.frequent_patterns import apriori, association_rules

# mengambil data dari db dengan join
df = pd.read_sql(
    """
    SELECT td.transaction_id AS order_id, p.item_name
    FROM transaction_details td
    INNER JOIN products p ON td.product_id = p.id
    """,
    engine
)

# mengubah tabel menjadi basket feature
basket = (
    df.groupby(['order_id', 'item_name'])['item_name']
    .count()
    .unstack(fill_value=0)
    .gt(0)
)

# implementasi apriori
frecuent_itemsets = apriori(basket, min_support=0.01, use_colnames=True)
rules = association_rules(frecuent_itemsets, metric="lift", min_threshold=1)

# ubah dari frozenset menjadi array
rules['antecedents'] = rules['antecedents'].apply(list)
rules['consequents'] = rules['consequents'].apply(list)

# ubah dari array menjadi format json sesuai dengan db
rules['antecedents'] = rules['antecedents'].apply(json.dumps)
rules['consequents'] = rules['consequents'].apply(json.dumps)

# ambil hanya field yang dibutuhkan
rules_db = rules[
    [
        'antecedents',
        'consequents',
        'support',
        'confidence',
        'lift',
    ]
]

# export ke db
rules_db.to_sql(
    'assosiation_rules',
    engine,
    if_exists='append',
    index=False
)