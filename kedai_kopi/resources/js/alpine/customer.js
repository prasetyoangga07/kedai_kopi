import Swal from "sweetalert2";

export default () => ({
    showModal: false,
    showDelete: false,
    mode: 'create',
    customer: {},
    errors: {},

    createCust() {
        this.mode = 'create';
        this.customer = {};
        this.showModal = true
    },

    editCust(cust) {
        this.mode = 'edit';
        this.customer = cust;
        this.showModal = true;
    },

    deleteCust(cust) {
        this.customer = { ...cust };
        this.showDelete = true;
    },

    async submit() {
        this.errors = {};

        const isEdit = this.mode === 'edit';
        const url = isEdit ? `/customers/${this.customer.id}` : '/customers';
        const formData = new FormData();

        if (isEdit) {
            formData.append('_method', 'PUT');
        }
        
        formData.append('name', this.customer.name);
        formData.append('email', this.customer.email);
        formData.append('phone', this.customer.phone);
        formData.append('points', this.customer.points);
        formData.append('status', this.customer.status);

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
                    text: "Periksa kembali data yang diinput",
                });

                return;
            }

            alert(result.message);
            this.showEdit = false;
            location.reload();

        } catch (errors) {
            console.error(errors);
            alert('Terjadi kesalahan sistem');
        }
    },
})