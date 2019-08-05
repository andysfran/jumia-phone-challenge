<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone numbers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a href="/" class="navbar-brand">Phone numbers</a>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 d-flex align-items-center">
                <div class="form-group">
                    <label for="Country">Country:</label>
                    <select id="countrySel" class="form-control form-control-sm">
                        <option value="">All</option>
                        <option value="(237)">Cameroon</option>
                        <option value="(251)">Ethiopia</option>
                        <option value="(212)">Morocco</option>
                        <option value="(258)">Mozambique</option>
                        <option value="(256)">Uganda</option>
                    </select>
                </div>

                <div class="form-group ml-3">
                    <label for="State">State:</label>
                    <select id="statusSel" class="form-control form-control-sm">
                        <option value="all">All</option>
                        <option value="valid">Valid phone numbers</option>
                        <option value="invalid">Invalid phone numbers</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Country</th>
                    <th scope="col">State</th>
                    <th scope="col">Country code</th>
                    <th scope="col">Phone number</th>
                </tr>
            </thead>
            <tbody id="body_table_phone">
            </tbody>
        </table>
        <div class="row float-right" role="group" aria-label="Basic example">
            <div class="col-12 d-flex flex-row">
                <button type="button" id="previousBtn" class="btn btn-primary">Previous</button>
                <button type="button" id="nextBtn" class="btn btn-primary ml-3">Next</button>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/listphones.js') }}" type="text/javascript"></script>
</body>
</html>