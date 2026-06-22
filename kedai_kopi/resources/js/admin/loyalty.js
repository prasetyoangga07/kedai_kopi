export default() => ({
    search: '',
    showModal: false,
    showDelete: false,
    isEdit: false,
    loyalty: {},
    errors: {},

    createLoyalty() {
        this.isEdit = false;
        this.errors = {};
        this.loyalty = {};
        this.showModal = true;
    },
    
    editLoyalty(loyalty) {
        this.isEdit = true;
        this.errors = {};
        this.loyalty = { ...loyalty };
        this.showModal = true;
    },

    async submit() {
        const url = this.isEdit ? `/loyalty/${this.loyalty.id}` : '/loyalty';
        const formData = new FormData();

        if (this.isEdit) {
            formData.append('_method', 'PUT');
        }

        formData.append('name', this.loyalty.name);
        formData.append('min_points', this.loyalty.min_points);
        formData.append('max_points', this.loyalty.max_points ?? '');
        formData.append('primary_color', this.loyalty.primary_color);
        formData.append('secondary_color', this.loyalty.secondary_color);
        formData.append('text_color', this.loyalty.text_color);

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
            });

            console.error(errors);
        }
    },

    syncColor(field, value) {
        if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
            this.level[field] = value;
        }
    },
})