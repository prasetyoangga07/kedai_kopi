export default () => ({
    showEdit: false,
    showDelete: false,
    product: {},
    errors: {},

    editProduct(product) {
        this.product = product;
        this.showEdit = true;
    },

    deleteProduct(product) {
        this.product = product;
        this.showDelete = true;
    },

    addVariant() {
        if (!this.product.variant) {
            this.product.variant = [];
        }
        this.product.variant.push({
            variant_name: '',
            price: '',
            is_active: false,
        });
    },

    generateSku(variant) {
        const category = (this.product.category || '')
            .toUpperCase()
            .replace(/[AIUEO\s]/g, '')
            .substring(0, 3);

        const product = (this.product.name || '')
            .replace(/\s+/g, '-')
            .toUpperCase()
            .substring(0, 3);;

        const size =
            variant.variant_name === 'Regular' ? '' :
                (variant.variant_name || '')
                    .substring(0, 1)
                    .toUpperCase();

        return [category, product, size]
            .filter(Boolean)
            .join('-');
    },

    async submitEdit() {
        this.errors = {};

        const formData = new FormData();

        formData.append('_method', 'PUT');
        formData.append('name', this.product.name);
        formData.append('category', this.product.category);
        formData.append('description', this.product.description);

        this.product.variant.forEach((variant, index) => {
            formData.append(
                `variant[${index}][id]`,
                variant.id ?? ''
            );
            formData.append(
                `variant[${index}][sku]`,
                variant.id ?? ''
            );
            formData.append(
                `variant[${index}][variant_name]`,
                variant.variant_name ?? ''
            );
            formData.append(
                `variant[${index}][price]`,
                variant.price ?? ''
            );
            formData.append(
                `variant[${index}][is_active]`,
                variant.price ? 1 : 0
            );
        });

        try {
            const response = await fetch(
                `/products/${this.product.id}`,
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':
                            document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: formData
                }
            );

            const result = await response.json();

            if (!response.ok) {
                this.errors = result.errors ?? {};

                console.log('Validation Error');
                console.log(this.errors);

                return;
            }

            alert(result.message);
            this.showEdit = false;
            location.reload();

        } catch (errors) {
            // console.log(errors);
            console.error(errors);
            alert('Terjadi kesalahan sistem');
        };
    }
})