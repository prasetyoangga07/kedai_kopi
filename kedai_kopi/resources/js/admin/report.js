export default () => ({
    async uploadCsv(event) {
    
        const formData = new FormData();
    
        formData.append(
            'csv_file',
            event.target.files[0]
        );
    
        const response = await fetch(
            '/import-csv',
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                },
                body: formData
            }
        );
    
        const result = await response.json();
    
        console.log(result);
    }
})
