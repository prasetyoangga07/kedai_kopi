export default (props = {}) => ({
    showModal: false,
    showDelete: false,
    mode: 'create',
    user: {},
    roles: props.roles ?? [],

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
    }
})