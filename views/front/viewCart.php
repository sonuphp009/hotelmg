<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('rooms'); ?>">Rooms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- booking main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Booking Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Photo</th>
                                        <th class="pro-title">Room Type</th>
                                        <th class="pro-price">Price/Night</th>
                                        <th class="pro-quantity">Nights</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $subtotal = 0;
                                    if(isset($bookingData) && !empty($bookingData)) {
                                        $i = 0;
                                        foreach ($bookingData as $room) {
                                            $i++;
                                            $subtotal += $room['total_price'];
                                    ?>
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <a href="#"><img class="img-fluid" src="<?php echo base_url().$room['room_image']; ?>" alt="Room" style="height: 50px;width: 50px;" /></a>
                                        </td>
                                        <td class="pro-title"><a href="#"><?php echo $room['room_type']; ?></a></td>
                                        <td class="pro-price">
                                            <input type="hidden" name="price<?php echo $i;?>" id="price<?php echo $i;?>" value="<?php echo $room['price_per_night'];?>">
                                            <span>₹<?php echo $room['price_per_night']; ?></span>
                                        </td>
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <a href="#" onclick="decreaseNights(<?php echo $room['room_id']; ?>, <?php echo $i; ?>)">-</a>
                                                <input type="text" name="nights<?php echo $i;?>" id="nights<?php echo $i;?>" value="<?php echo $room['nights']; ?>" style="width: 50px;text-align: center;height: 30px;" onblur="updateBookingNights(<?php echo $room['room_id']; ?>, <?php echo $i; ?>)">
                                                <a href="#" onclick="increaseNights(<?php echo $room['room_id']; ?>, <?php echo $i; ?>)">+</a>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>₹<?php echo $room['total_price']; ?></span></td>
                                        <td class="pro-remove"><a href="#" onclick="removeRoom(<?php echo $room['booking_id']; ?>)"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <?php } } else { ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No rooms booked yet.</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Booking + Family Form -->
                <form action="<?php echo base_url('booking/create'); ?>" method="POST">
                    <div class="row mt-4">
                        <div class="col-lg-7">
                            <div class="booking-customer-form">
                                <h5>Customer Information</h5>

                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" required />
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Check-in Date</label>
                                        <input type="date" name="check_in" class="form-control" required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Check-out Date</label>
                                        <input type="date" name="check_out" class="form-control" required />
                                    </div>
                                </div>

                                <!-- Family Details -->
                                <h5 class="mt-4">Family Details</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Adults</label>
                                        <input type="number" name="adults" class="form-control" min="1" value="1" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Children</label>
                                        <input type="number" name="children" class="form-control" min="0" value="0" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Family Members</label>
                                        <input type="number" name="family_members" class="form-control" min="1" value="1" />
                                    </div>
                                </div>

                                <div id="family-members-list" class="mt-3">
                                    <h6>Add Family Member Details</h6>
                                    <div class="family-member mb-2">
                                        <input type="text" name="member_name[]" class="form-control mb-1" placeholder="Member Name">
                                        <input type="number" name="member_age[]" class="form-control mb-1" placeholder="Age">
                                        <select name="member_relation[]" class="form-control">
                                            <option value="">Relation</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-outline-secondary mt-2" onclick="addFamilyMember()">+ Add More Members</button>
                            </div>
                        </div>

                        <!-- Booking Summary -->
                        <div class="col-lg-5">
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Booking Summary</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>₹<?php echo $subtotal; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Service Charges</td>
                                                <td>₹0</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total Amount</td>
                                                <td class="total-amount">₹<?php echo $subtotal; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <input type="hidden" name="amount" value="<?php echo $subtotal; ?>" />
                                <button type="submit" class="btn btn-sqr d-block">Proceed to Payment</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- booking main wrapper end -->
</main>

<!-- JS -->
<script>
function increaseNights(roomId, index){
    let nightsInput = document.getElementById('nights'+index);
    nightsInput.value = parseInt(nightsInput.value) + 1;
    updateBookingNights(roomId, index);
}

function decreaseNights(roomId, index){
    let nightsInput = document.getElementById('nights'+index);
    if(nightsInput.value > 1){
        nightsInput.value = parseInt(nightsInput.value) - 1;
        updateBookingNights(roomId, index);
    }
}

function updateBookingNights(roomId, index){
    // You can call your AJAX update booking nights function here
    console.log("Updating nights for room:", roomId);
}

function removeRoom(bookingId){
    if(confirm("Remove this room from your booking?")){
        console.log("Removing booking:", bookingId);
        // Add your AJAX remove room logic here
    }
}

// Dynamically add family member inputs
function addFamilyMember(){
    const container = document.getElementById('family-members-list');
    const div = document.createElement('div');
    div.classList.add('family-member', 'mb-2');
    div.innerHTML = `
        <input type="text" name="member_name[]" class="form-control mb-1" placeholder="Member Name">
        <input type="number" name="member_age[]" class="form-control mb-1" placeholder="Age">
        <select name="member_relation[]" class="form-control">
            <option value="">Relation</option>
            <option value="Father">Father</option>
            <option value="Mother">Mother</option>
            <option value="Son">Son</option>
            <option value="Daughter">Daughter</option>
            <option value="Spouse">Spouse</option>
            <option value="Other">Other</option>
        </select>
    `;
    container.appendChild(div);
}
</script>
