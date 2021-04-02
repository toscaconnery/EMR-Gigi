<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Resume</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</head>
<body>
    <div id="printable">
        <h1>Electronic Medical Resume</h1>
        <table>
            <thead>
                <th>NO</th>
                <th>Name</th>
                <th>Data</th>
            </thead>
            <tbody>
                <td>1</td>
                <td>Lkjs lsdls</td>
                <td>lsdkfjlksdjflsjfl</td>
            </tbody>
            <tbody>
                <td>2</td>
                <td>Lkjs lsdls</td>
                <td>lsdkfjlksdjflsjfl</td>
            </tbody>
            <tbody>
                <td>3</td>
                <td>Lkjs lsdls</td>
                <td>lsdkfjlksdjflsjfl</td>
            </tbody>
    
        </table>
    </div>
    <button id="print_button">PRINT</button>
</body>
<script>
    $(document).ready(function(){
        function printDiv() {
            var printContents = document.getElementById('printable').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        $('#print_button').on('click', function() {
            printDiv()
        })

        
    });
</script>
</html>