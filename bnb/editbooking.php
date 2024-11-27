<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $(function() {
            $('#checkinDate').datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: 0,
                onSelect: function(dateText) {
                    const checkinDate = $('#checkinDate').datepicker('getDate');
                    $('#checkoutDate').datepicker('option', 'minDate', checkinDate);
                }
            });
            $('#checkoutDate').datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: 0,
            });
        });

        

    </script>
</head>
<body>
    <h1>Edit Booking</h1>
    <h2>Booking for [user]</h2>
    
    <form method="post">
        <label for="rooms">Room (name, type, beds):</label>
        <select id="rooms" name="room-picker">
            <option value="test-room">Test Room</option>
        </select>
        <p>Checkin Date:
        <input type="text" name="checkin-date" id="checkinDate" class="datepicker" required />
        </p>
        <p>
            Checkout Date:
            <input type="text" name="checkout-date" id="checkoutDate" class="datepicker" required />
        </p>
        <p>
            Contact Number
            <input type="tel" name="phone-no" id="phone" pattern="\(\d{3}\) \d{3}-\d{4}" required />
        </p>
        <p>
            <label for="booking-extras">Booking Extras</label>
            <br>
            <textarea name="booking-extras" rows="4" cols="50"></textarea>
        </p>
        <button type="submit">Submit</button>
    </form>
</body>
</html>