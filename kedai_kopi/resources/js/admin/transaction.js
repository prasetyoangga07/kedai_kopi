export default () => ({
    filter: "all",
    openTransaction: null,

    showTransaction(status) {
        if (this.filter === "all") {
            return true;
        }

        return status === this.filter;
    },

    toggleTransaction(id) {
        this.openTransaction = this.openTransaction === id ? null : id;
    },
});
