@extends('layouts.app')

@section('title', 'Contact Us - EZofz.lk')
@section('description', 'Get in touch with EZofz.lk team. We are here to help with your office automation needs.')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5" data-aos="fade-up">
                <h1 class="display-4 fw-bold text-primary mb-4">Contact Us</h1>
                <p class="lead">We'd love to hear from you. Get in touch with our team.</p>
            </div>

            <div class="row g-5">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="bg-light rounded-3 p-5">
                        <h3 class="fw-bold mb-4">Send us a Message</h3>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-send me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left">
                    <div class="bg-primary text-white rounded-3 p-4 mb-4">
                        <h4 class="fw-bold mb-3">Contact Information</h4>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt fs-4 me-3"></i>
                            <div>
                                <h6 class="mb-0">Address</h6>
                                <p class="mb-0">Colombo, Sri Lanka</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope fs-4 me-3"></i>
                            <div>
                                <h6 class="mb-0">Email</h6>
                                <p class="mb-0">info@ezofz.lk</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-phone fs-4 me-3"></i>
                            <div>
                                <h6 class="mb-0">Phone</h6>
                                <p class="mb-0">+94 XX XXX XXXX</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light rounded-3 p-4">
                        <h5 class="fw-bold mb-3">Office Hours</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Monday - Friday</span>
                            <span>9:00 AM - 5:00 PM</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Saturday</span>
                            <span>9:00 AM - 2:00 PM</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Sunday</span>
                            <span>Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
