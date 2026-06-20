export default (currentRoute) => ({
    sidebarOpen: true,
    menu: {
        master: false,
        credential: false,
        report: false
    },

    init() {
        const groups = {
            master: [
                'products.',
                'campaigns.'
            ],

            credential: [
                'users.',
                'roles.'
            ],

            report: [
                'reports.',
                'apriori.'
            ]
        };

        Object.keys(groups).forEach(group => {
            this.menu[group] = groups[group].some(route =>
                currentRoute.startsWith(route)
            );
        });
    }
})