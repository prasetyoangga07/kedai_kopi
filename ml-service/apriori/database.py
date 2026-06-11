from dotenv import load_dotenv
from sqlalchemy import create_engine, text
import os

load_dotenv("../kedai_kopi/.env")

DB_HOST = os.getenv("DB_HOST")
DB_PORT = os.getenv("DB_PORT")
DB_DATABASE = os.getenv("DB_DATABASE")
DB_USERNAME = os.getenv("DB_USERNAME")
DB_PASSWORD = os.getenv("DB_PASSWORD")

engine = create_engine(
    f"mysql+pymysql://{DB_USERNAME}:{DB_PASSWORD}@{DB_HOST}:{DB_PORT}/{DB_DATABASE}"
)

with engine.begin() as conn:
    conn.execute(
        text("TRUNCATE TABLE assosiation_rules")
    )