export default () => ({
    show: false,
    message: '',
    type: 'success',

    init() {
        window.addEventListener('toast', (event) => {
            this.message = event.detail.message;
            this.type = event.detail.type ?? 'success';

            this.show = true;

            setTimeout(() => {
                this.show = false;
            }, 3000);
        });
    }
});