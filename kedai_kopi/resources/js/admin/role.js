export default () => ({
    search: '',
    showModal: false,
    showDelete: false,
    isEdit: false,
    errors: {},

    role: {
        id: null,
        name: '',
        guard_name: 'web',
        permissions: [],
    },

    createRole() {
        this.isEdit = false;
        this.errors = {};
        this.role = { id: null, name: '', guard_name: 'web', permissions: [] };
        this.showModal = true;
    },

    editRole(data) {
        this.isEdit = true;
        this.errors = {};
        this.role = {
            ...data,
            permissions: data.permissions.map(p => p.id),
        };
        this.showModal = true;
    },

    deleteRole(data) {
        this.role = data;
        this.showDelete = true;
    },

    async submit() {
        const url = this.isEdit ? `/roles/${this.role.id}` : `/roles`;
        const method = this.isEdit ? 'PUT' : 'POST';

        const res = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify(this.role),
        });

        const data = await res.json();

        if (!res.ok) {
            this.errors = data.errors ?? {};

            Swal.fire({
                icon: "error",
                title: "Validasi Gagal",
                text: errors.message,
            });

            console.error(errors);
        }

        await Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: data.message,
        });

        location.reload();
    },
});