<!DOCTYPE html>
<html>
<head>
    <title>JS Front End Example with CORS</title>
</head>
<body>
    <h1>Hello World</h1>

    <script type="text/javascript">

        const url='http://localhost:8000/api/users/index';

        var request = new Request(url, {
            method: 'GET'
        });

        fetch(request)
            .then((resp) => resp.json())
            .then(function(data) {
                return data.map(function(people) {
                    console.log("Names: " + people.name);
                    document.writeln(people.name);
                })
            })
            .catch(function(error) {
                console.log('Connection error : ');
            });
    </script>
</body>
</html>