export default () => ({
    showEdit: false,
    showDelete: false,
    customer: {},
    errors: {},

    editCust(cust) {
        this.customer = cust;
        this.showEdit = true;
    },

    deleteCust(cust) {
        this.customer = cust;
        this.showDelete = true;
    },

    async submitEdit() {
        const formData = new FormData();

        formData.append('_method', 'PUT');
        formData.append('name', this.customer.name);
        formData.append('email', this.customer.email);
        formData.append('phone', this.customer.phone);
        formData.append('points', this.customer.points);
        formData.append('status', this.customer.status);

        try {
            const response = await fetch(
                `/customers/${this.customer.id}`,
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

                console.log('Validation error');
                console.log(this.errors);

                return;
            }

            alert(result.message);
            this.showEdit = false;
            location.reload();
            
        } catch (errors) {
            console.error(errors);
            alert('Terjadi kesalahan sistem');
        }
    }
})