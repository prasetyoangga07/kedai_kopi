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
                'campaigns.',
                'loyalty.'
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
    },

    confirmLogout() {
        Swal.fire({
            title: 'Logout Akun?',
            html: `
            <p class="text-gray-600">
                Anda akan keluar dari sistem KOPIN CRM
            </p>
        `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8B5E3C',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-[24px]'
            }

        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    },
})