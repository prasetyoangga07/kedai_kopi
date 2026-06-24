export default () => ({
    detailModal: false,
    tx: {},

    openDetail(tx) {
        this.tx = tx;
        this.detailModal = true;

        console.log(this.tx);
    }
});
