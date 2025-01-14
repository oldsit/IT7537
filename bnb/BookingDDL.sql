CREATE TABLE IF NOT EXISTS bookings (
    bookingID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    customerID INT UNSIGNED DEFAULT NULL,
    roomID INT UNSIGNED DEFAULT NULL,
    checkin_date DATE DEFAULT NULL,
    checkout_date DATE DEFAULT NULL,
    contact_number VARCHAR(25) DEFAULT NULL,
    booking_extra TEXT DEFAULT NULL,
    review TEXT DEFAULT NULL,
    PRIMARY KEY (bookingID),
    FOREIGN KEY (customerID) REFERENCES customer(customerID)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (roomID) REFERENCES room(roomID)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);
