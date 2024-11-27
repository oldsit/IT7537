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

        $(function() {
            $('#queryCheckinDate').datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: 0,
                onSelect: function(dateText) {
                    const checkinDate = $('#queryCheckinDate').datepicker('getDate');
                    $('#queryCheckoutDate').datepicker('option', 'minDate', queryCheckinDate);
                }
            });
            $('#queryCheckoutDate').datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: 0,
            });
        });

        $(function(searchRooms) {
            const checkinDate = document.getElementById('queryCheckinDate').value;
            const checkoutDate = document.getElementById('queryCheckoutDate').value;

            //AJAX Request
            const xhr = new XMLHttpRequest();

            xhr.open('GET', `/filter.php?checkin=${checkinDate}&checkout=${checkoutDate}`, true)
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status = 200) {
                   const rooms = JSON.parse(xhr.responseText);
                   // Will need to implement functions to display data on screen but hardto do without the backend being completed :) - Ben
                } else {
                    // Data was not received
                    console.log('Some error occured.');
                    
                }
            }
    </script>
</head>
<body>
    <h1>Make a Booking</h1>
    <h2>Booking for [user]</h2>
    <h4>Search for Rooms</h4>
    Check-In Date: <input type="text" name="checkin-date" id="queryCheckinDate" class="datepicker"/> Check-Out Date: <input type="text" name="checkout-date" id="queryCheckoutDate" class="datepicker" required /> <button type="button" onclick="searchDates()">Search Availability</button>
    <br>
    <br>
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