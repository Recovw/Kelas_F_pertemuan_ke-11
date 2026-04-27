    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <title>Create</title>
    </head>
    <body class=bg-light>
        <div class='container mt-5'>
            <div class = 'card col-md-6 mx-auto shadow-sm'>
                <div class='card-header bg-primary text-white'>
                    <h5>Add New Item</h5>
                    
                    <form action="{{route('create')}}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class='mb-3'>
                            <label>Item Name</label>
                            <input type="text" name='name' class='form-control' required>
                        </div>

                        <div class='mb-3'>
                            <label>Item Description</label>
                            <input type="text" name='description' class='form-control' required>
                        </div>

                        <div class='mb-3'>
                            <label>Item Stock</label>
                            <input type="text" name='stock' class='form-control' required>
                        </div>

                        <div class='mb-3'>
                            <label>Item Image</label>
                            <input type="file" name='image' class='form-control'>
                        </div>

                        <div class="mb-3">
                            <label>Item Document</label>
                            <input type="file" name="dokumen" class="form-control" accept=".pdf">
                        </div>

                        <button class='btn btn-success'>Save Item</button>
                        <a href="{{route('admin.page')}}" class='btn btn-secondary w-100 mt-2'>Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
    </html>