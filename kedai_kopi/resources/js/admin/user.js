export default (props = {}) => ({
    showModal: false,
    showDelete: false,
    mode: 'create',
    user: {},
    errors: {},
    roles: props.roles ?? [],
    statusFilter: 'all',

    init() {
        this.statusFilter =
            new URLSearchParams(window.location.search)
                .get('type') ?? 'all';
    },

    createUser() {
        this.mode = 'create';
        this.user = {};
        this.showModal = true;
    },

    editUser(user) {
        this.mode = 'edit';
        this.user = { ...user };
        this.showModal = true;
    },

    deleteUser(user) {
        this.user = { ...user };
        this.showDelete = true;
    },

    async submit() {
        const isEdit = this.mode === 'edit';
        const url = isEdit ? `/users/${this.user.id}` : '/users';
        const formData = new FormData();

        if (isEdit) {
            formData.append('_method', 'PUT');
        }

        formData.append('name', this.user.name);
        formData.append('email', this.user.email);
        formData.append('role', this.user.role);

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

    applyFilter(type) {
        this.statusFilter = type;
        const params = new URLSearchParams();

        if (this.search) {
            params.set('search', this.search);
        }

        // if (this.role) {
            params.set('type', type);
        // }

        window.location = `${window.location.pathname}?${params.toString()}`;
    }
})