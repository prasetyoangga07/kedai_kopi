export default () => ({
    showModal: false,
    showDelete: false,
    mode: 'create',
    product: {},
    errors: {},

    createProduct() {
        this.mode = 'create';
        this.product = {};
        this.showModal = true;
    },

    editProduct(product) {
        this.mode = 'edit';
        this.product = product;
        this.showModal = true;
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

    async submit() {
        this.errors = {};

        const isEdit = this.mode === 'edit';
        const url = isEdit ? `/products/${this.product.id}` : '/products';
        const formData = new FormData();

        if (isEdit) {
            formData.append('_method', 'PUT');
        }

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
                variant.sku ?? ''
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
                variant.is_active ? 1 : 0
            );
        });

        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN':
                        document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (!response.ok) {
                this.errors = result.errors ?? {};

                Swal.fire({
                    icon: "error",
                    title: "Validasi Gagal",
                    text: result.message,
                });

                return;
            }

            this.showEdit = false;

            await Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: result.message,
            });

            location.reload();

        } catch (errors) {
            Swal.fire({
                icon: "error",
                title: "Validasi Gagal",
                text: "Sistem tidak tersedia saat ini",
            })

            console.error(errors);
        };
    }
})