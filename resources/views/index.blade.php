<html>

<head>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div id="commodities">
        </div>
    </div>
    <!-- 引入 Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log('log');
            console.info('info');
            console.error('error');
            console.debug('debug');
            console.warn('warn');


            const render = (commodities) => {
                const list = $('#commodities');
                let row = null;

                for (i = 0; i < commodities.length; i++) {
                    if (i % 3 === 0) {
                        if (row !== null) {
                            row.appendTo(list);
                        }

                        row = $('<div>').addClass('row');
                    }

                    let item = $('<div>').addClass('col-md-4').appendTo(row);
                    let img = $('<img>').attr('src', commodities[i].img).appendTo(item);
                    let info = $('<div>').addClass('row').appendTo(item);
                    let title = $('<h4>').addClass('col-md-4').text(commodities[i].title).appendTo(info);
                    let price = $('<p>').addClass('col-md-8 align-right text-danger').text(`$${commodities[i].price}`).appendTo(info);
                }

                if (row !== null) {
                    row.appendTo(list);
                }
            }

            axios.get('api/commodities')
                .then(function(response) {
                    console.log(response.data);
                    render(response.data);
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>
</body>

</html>