<?php

use App\Sector;
use App\ProjectPage;
use Illuminate\Http\Request;

//A&I Injections
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PackageController;

Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    echo 'ok';
});

// Route::get('htje', function(){
//     $certifications = App\Certification::paginate(10);
//     return view('front.certification.index', compact('certifications'));
// });


// routes to packages pages/web.php
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Sectors\sectorController;

//Sectors routes
Route::get('/forestry', [sectorController::class, 'forestry'])->name('forestry');
Route::get('/tourism', [sectorController::class, 'tourism'])->name('tourism');
Route::get('/manufacturing', [sectorController::class, 'manufacturing'])->name('manufacturing');
Route::get('/statistics', [sectorController::class, 'statistics'])->name('statistics');
Route::get('/economy', [sectorController::class, 'economy'])->name('economy');
Route::get('/real_estate', [sectorController::class, 'real_estate'])->name('real_estate');
Route::get('/lands', [sectorController::class, 'lands'])->name('lands');
Route::get('/health', [sectorController::class, 'health'])->name('health');
Route::get('/fisheries', [sectorController::class, 'fisheries'])->name('fisheries');
Route::get('/energy', [sectorController::class, 'energy'])->name('energy');
Route::get('/water', [sectorController::class, 'water'])->name('water');
Route::get('/trade', [sectorController::class, 'trade'])->name('trade');
Route::get('/BFSI', [sectorController::class, 'BFSI'])->name('BFSI');
Route::get('/retail', [sectorController::class, 'retail'])->name('retail');
Route::get('/gender', [sectorController::class, 'gender'])->name('gender');
Route::get('/oil_gas', [sectorController::class, 'oil_gas'])->name('oil_gas');
Route::get('/education', [sectorController::class, 'education'])->name('education');
Route::get('/governance', [sectorController::class, 'governance'])->name('governance');
Route::get('/hospitality', [sectorController::class, 'hospitality'])->name('hospitality');
Route::get('/transport', [sectorController::class, 'transport'])->name('transport');
Route::get('/organizations', [sectorController::class, 'organizations'])->name('organizations');
Route::get('/ict', [sectorController::class, 'ict'])->name('ict');


























Route::get('/dataservices', 'DataServiceController@index')->name('dataservices');
Route::get('/elearning', 'ELearningController@index')->name('elearning');
Route::get('/ecommerece', 'ECommereceController@index')->name('ecommerece');
Route::get('/media', 'MediaController@index')->name('media');
Route::get('/techengineering', 'TechEngineeringController@index')->name('techengineering');
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/consultation', 'TrainingConsultationController@index')->name('consultation');
Route::get('/industires', 'Industry@index')->name('industires');
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{type}', [PackageController::class, 'show'])->name('packages.show');




// Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
use App\Http\Controllers\Sector\forestryController;
use App\Http\Controllers\CertificationCategoryController;
use app\Http\Controllers\Backoffice\ProjectPage\ProjectPageController;

Route::get('home1', function(){
    return view('front.index');
});

Route::get('/', 'HomeController')->name('home');
Route::post('/wishlist/submit', [WishlistController::class, 'submit'])->name('contact.submit');


Route::get('home1', function() {
    $projects = App\ProjectPage::All();
    return view('front.index', compact('projects'));

});
Route::get('about', 'AboutController')->name('about');

Route::get('event', 'AboutController@event')->name('event');

// delete this controller after done

Route::get('careers', 'OpportunityController@careers')->name('careers');
Route::get('career/{career}', 'OpportunityController@career')->name('career');
Route::get('terms-and-conditions', 'AboutController@terms_conditions')->name('terms-and-conditions');
Route::get('privacy-policy', 'AboutController@privacy_policy')->name('privacy-policy');
Route::get('sitemap', 'AboutController@sitemap')->name('sitemap');
Route::get('our-venues', 'AboutController@our_venues')->name('our-venues');
Route::get('our-clients', 'AboutController@clients')->name('clients');
Route::get('our-clients/{slug}', 'AboutController@viewClients')->name('viewClients');
Route::get('all-clients/', 'AboutController@allClients')->name('all-clients');
Route::get('contact', 'ContactController@form')->name('contact');
Route::post('contact/submit', 'ContactController@submit')->name('contact.submit');
Route::get('search', 'SearchController@index')->name('search');

// Route::get('faqs', 'FAQController@index')->name('faqs');
// Route::get('faqs/{tag?}', 'FAQController@show')->name('faqs-show');
Route::get('faqs/{tag?}', 'FAQController@show')->name('faqs');

// Route::get('faqs/{id}', 'FAQController@show')->name('faqs-show');

Route::get('partner-with-us', 'ContactController@partner')->name('partner-with-us');
Route::get('sector', 'ServiceController@sectors')->name('sector');
Route::get('agriculture', 'ServiceController@agriculture')->name('agriculture');
Route::get('sector/{slug}', 'ServiceController@industry')->name('sector-service');
Route::get('previous-projects/{field?}/{data?}','ProjectsDisplayController@index')->name('previousprojects');
Route::get('previous-project/{id}','ProjectsDisplayController@show')->name('previousproject');
//Route::get('insurance', 'ServiceController@insurance')->name('insurance');
//Route::get('energy', 'ServiceController@energy')->name('energy');
//Route::get('banking', 'ServiceController@banking')->name('banking');
//Route::get('ngo', 'ServiceController@ngo')->name('ngo');
//Route::get('education', 'ServiceController@education')->name('education');
//Route::get('labor', 'ServiceController@labor')->name('labor');
//Route::get('trade', 'ServiceController@trade')->name('trade');
//Route::get('tourism', 'ServiceController@tourism')->name('tourism');
//Route::get('econ', 'ServiceController@econ')->name('econ');
//Route::get('micro', 'ServiceController@micro')->name('micro');
//Route::get('sacco', 'ServiceController@sacco')->name('sacco');
//Route::get('realestate', 'ServiceController@realestate')->name('realestate');
Route::get('capability', 'ServiceController@capabilities')->name('capability');
Route::get('corporate', 'ServiceController@corporates')->name('corporate');
Route::get('become-an-affiliate', 'ContactController@affiliate')->name('become-an-affiliate');
Route::get('become-an-agent', 'ContactController@agent')->name('become-an-agent');
Route::get('projects', 'ProjectsController@projects')->name('projects');
Route::get('trainers', 'TrainerApplicationController@index')->name('trainers');

Route::
        namespace('Certification')->group(function () {
            Route::name('certification.')->group(function () {
                Route::prefix('certification')->group(function () {
                    Route::namespace ('Bundle')->group(function () {
                        Route::name('bundle.')->group(function () {
                            Route::prefix('bundle')->group(function () {
                                Route::post('document', 'BundleController@document')->name('document');
                                Route::get('{booking}/feedback', 'BookingController@feedback')->name('booking.feedback');
                                Route::name('payment.')->group(function () {
                                    Route::prefix('payment')->group(function () {
                                        Route::namespace ('Payment')->group(function () {
                                            Route::name('paypal.')->group(function () {
                                                Route::prefix('paypal')->group(function () {
                                                    Route::get('{payment}/create', 'PaypalController@create')->name('create');
                                                    Route::get('execute', 'PaypalController@execute')->name('execute');
                                                    Route::get('{payment}/cancel', 'PaypalController@cancel')->name('cancel');
                                                });
                                            });
                                        });
                                    });
                                });
                            });
                        });

                        Route::resource('bundle.booking', 'BookingController')->only(['create', 'store']);

                        Route::resource('bundle', 'BundleController')->only(['index', 'show']);
                    });

                    Route::post('document', 'CertificationController@document')->name('document');
                    Route::get('{booking}/feedback', 'BookingController@feedback')->name('booking.feedback');
                    Route::name('payment.')->group(function () {
                        Route::prefix('payment')->group(function () {
                            Route::namespace ('Payment')->group(function () {
                                Route::name('paypal.')->group(function () {
                                    Route::prefix('paypal')->group(function () {
                                        Route::get('{payment}/create', 'PaypalController@create')->name('create');
                                        Route::get('execute', 'PaypalController@execute')->name('execute');
                                        Route::get('{payment}/cancel', 'PaypalController@cancel')->name('cancel');
                                    });
                                });
                            });
                        });
                    });

                    Route::resource('category', 'CategoryController')->only(['index', 'show']);
                    Route::resource('category.subcategory', 'SubcategoryController')->only('show');
                });
            });

            Route::resource('certification.booking', 'BookingController')->only(['create', 'store']);
            Route::resource('certification', 'CertificationController')->only(['index', 'show']);
        });

Route::name('course.')->group(function () {
    Route::namespace ('Course')->group(function () {
        Route::resource('course.booking', 'BookingController')->only(['create', 'store'])->names([
            'create' => 'booking.create',
            'store' => 'booking.store',
        ]);
        Route::prefix('course')->group(function () {
            Route::post('bundle/document', 'BundleController@document')->name('document');
            Route::namespace ('Bundle')->group(function () {
                Route::resource('certification.booking', 'BookingController')->only([
                    'create',
                    'store'
                ])->parameters(['certification' => 'bundle']);
                Route::name('certification.')->group(function () {
                    Route::prefix('certification')->group(function () {
                        Route::get('{booking}/feedback', 'BookingController@feedback')->name('booking.feedback');
                        Route::name('payment.')->group(function () {
                            Route::prefix('payment')->group(function () {
                                Route::namespace ('Payment')->group(function () {
                                    Route::name('paypal.')->group(function () {
                                        Route::prefix('paypal')->group(function () {
                                            Route::get('{payment}/create', 'PaypalController@create')->name('create');
                                            Route::get('execute', 'PaypalController@execute')->name('execute');
                                            Route::get('{payment}/cancel', 'PaypalController@cancel')->name('cancel');
                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            });

            Route::resource('certification', 'BundleController')->only(['index', 'show'])->parameters([
                'certification' => 'bundle'
            ]);
        });

        Route::prefix('course')->group(function () {
            Route::get('search', 'SearchController@index')->name('search');
            Route::get('schedule/{category?}/{subcategory?}/{topic?}', 'ScheduleController')->name('schedule');
            Route::get('face-to-face', 'PhysicalClassController@index')->name('physical');
            Route::get('virtual', 'VirtualClassController@index')->name('virtual');
            Route::get('elearning', 'ElearningClassController@index')->name('elearning');
            Route::resource('category', 'CategoryController')->only(['index', 'show']);
            Route::resource('category.subcategory', 'SubcategoryController')->only(['index', 'show']);
            Route::get('ajax-courses/{subcategory}', 'SubcategoryController@AllCoursesAjaxRequest')->name('ajax-courses');
            Route::get('topic/{topic}', 'TopicController@show')->name('topic.show');
            Route::get('topic/{topic}/{duration}', 'DurationController@duration')->name('topic.duration');
            Route::get('/category/{category}/{duration}', 'DurationController@categoryWeek')->name('category.week');
            Route::get('/category/weeks/{category}/{duration}', 'DurationController@categoryWeeks')->name('category.weeks');
            Route::get('/duration/{topic}/{weeks}', 'DurationController@weeks')->name('topic.weeks');
            Route::post('document/download', 'CourseController@document')->name('document.download');
            Route::post('{course}/enquiry', 'CourseController@enquiry')->name('enquiry');
            Route::post('{course}/referral', 'CourseController@referral')->name('referral');
            Route::get('booking/{booking}/feedback', 'BookingController@feedback')->name('booking.feedback');
            Route::get('{course}', 'CourseController@show')->name('show');
            Route::get('{course}/{type}', 'CourseController@schedules')->name('course-schedules');
        });

        Route::name('payment.')->group(function () {
            Route::prefix('payment')->group(function () {
                Route::namespace ('Payment')->group(function () {
                    Route::name('paypal.')->group(function () {
                        Route::prefix('paypal')->group(function () {
                            Route::get('{payment}/create', 'PaypalController@create')->name('create');
                            Route::get('execute', 'PaypalController@execute')->name('execute');
                            Route::get('{payment}/cancel', 'PaypalController@cancel')->name('cancel');
                        });
                    });

                    Route::name('log.')->group(function () {
                        Route::prefix('log')->group(function () {
                            Route::namespace ('Log')->group(function () {
                                Route::name('paypal.')->group(function () {
                                    Route::prefix('paypal')->group(function () {
                                        Route::get('{payment}/create', 'PaypalController@create')->name('create');
                                        Route::get('execute', 'PaypalController@execute')->name('execute');
                                        Route::get('{payment}/cancel', 'PaypalController@cancel')->name('cancel');
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
        Route::name('industry.')->group(function () {
            Route::get('industry-courses', 'CourseIndustryController@index')->name('index');
            Route::get('industry-courses/{industry}', 'CourseIndustryController@show')->name('show-industry');
            Route::get('industry/course/{course}', 'CourseIndustryController@view')->name('view');
            Route::get('services/{service_capability}', 'CourseIndustryController@services')->name('service-capability');
            Route::get('service/{service}', 'CourseIndustryController@service')->name('service');
            Route::post('service/{service}/enquiry', 'CourseIndustryController@enquiry')->name('enquiry');
        });
        Route::name('venue.')->group(function () {
            Route::get('venue', 'TrainingVenueController@index')->name('index');
            // added by hillary
            Route::get('venues/{city}', 'TrainingVenueController@show')->name('show');

        });
    });
});

Route::name('software.')->group(function () {
    Route::prefix('software')->group(function () {
        Route::namespace ('Software')->group(function () {
            Route::name('quotation.')->group(function () {
                Route::prefix('quotation')->group(function () {
                    Route::get('{software}/create', 'QuotationController@create')->name('create');
                    Route::post('{software}/store', 'QuotationController@store')->name('store');
                });
            });
        });

        Route::get('/', 'SoftwareController@index')->name('index');
        Route::get('{software}', 'SoftwareController@show')->name('show');
        Route::post('quote', 'SoftwareController@quote')->name('quote');
    });
});

// Ires Programs frontend
Route::name('programs.')->prefix('programs')->namespace('Programs')->group(function () {
    Route::get('/', 'ProgramController@index')->name('program');
    Route::get('/{program}', 'ProgramController@show')->name('program');
    Route::get('/{program}/register', 'ProgramController@register')->name('register');
    Route::post('/{program}/register', 'ProgramController@newReg')->name('registration');
    Route::get('/{slug}/feedback', 'ProgramController@feedback')->name('booking.feedback');
    Route::get('/{slug}/paypal-feedback', 'ProgramController@feedback')->name('booking.paypalfeedback');
    Route::post('/brochure-download/{program}', 'ProgramController@download')->name('brochure.download');
});

Route::name('tour.')->group(function () {
    Route::prefix('tour')->group(function () {
        Route::namespace ('Tour')->group(function () {
            Route::name('booking.')->group(function () {
                Route::get('{tour}/booking', 'BookingController@create')->name('create');
                Route::post('{tour}/booking', 'BookingController@store')->name('store');
            });
        });

        Route::post('document/download', 'TourController@document')->name('document');
        Route::post('{tour}/enquiry', 'TourController@enquiry')->name('enquiry');
        Route::post('{tour}/referral', 'TourController@referral')->name('referral');
        Route::post('{tour}/itinerary', 'TourController@itinerary')->name('itinerary');
    });
});

Route::resource('tour', 'TourController')->only(['show', 'index']);
Route::resource('trainer_application', 'TrainerApplicationController')->only(['create', 'store']);
Route::resource('hotel_reservation', 'HotelReservationController')->only(['create', 'store']);
Route::name('training_calendar.')->group(function () {
    Route::prefix('training-calendar')->group(function () {
        Route::get('/', 'TrainingCalendarController@index')->name('index');
        Route::get('export', 'TrainingCalendarController@export')->name('export');
        Route::get('{calendar}', 'TrainingCalendarController@form')->name('download.form');
        Route::post('{calendar}/download', 'TrainingCalendarController@download')->name('download');
    });
});

Route::name('customer.')->group(function () {
    Route::name('account.')->group(function () {
        Route::namespace ('Customer')->group(function () {
            Route::get('register', 'AccountController@create')->name('register');
            Route::post('register/store', 'AccountController@store')->name('register.store');
            Route::name('profile.')->group(function () {
                Route::prefix('profile')->group(function () {
                    Route::get('show', 'AccountController@show')->name('show');
                    Route::get('edit', 'AccountController@edit')->name('edit');
                    Route::put('update', 'AccountController@update')->name('update');
                });
            });

            Route::name('settings.')->group(function () {
                Route::prefix('settings')->group(function () {
                    Route::get('/', 'SettingsController@edit')->name('edit');
                    Route::put('update', 'SettingsController@update')->name('update');
                });
            });

            Route::resource('software-quote', 'SoftwareController')->only(['index', 'show'])->names([
                'index' => 'software_quote.index',
                'show' => 'software_quote.show',
            ]);

            Route::resource('hotel-reservation', 'HotelReservationController')->only(['index', 'show'])->parameters([
                'hotel-reservation' => 'reservation'
            ])->names([
                        'index' => 'reservation.index',
                        'show' => 'reservation.show',
                    ]);

            Route::prefix('booking')->group(function () {
                Route::post('tour/{booking}/review', 'TourController@review')->name('tour.review');
                Route::resource('tour', 'TourController')->only(['index', 'show'])->parameters([
                    'tour' => 'booking'
                ]);

                Route::name('course.')->group(function () {
                    Route::prefix('course')->group(function () {
                        Route::post('{booking}/review', 'CourseController@review')->name('review');
                        Route::post('{booking}/issue', 'CourseController@issue')->name('issue');
                        Route::get('{booking}/feedback', 'CourseController@feedback')->name('feedback');
                    });
                });

                Route::resource('course', 'CourseController')->only(['index', 'show'])->parameters([
                    'course' => 'booking'
                ]);

                Route::name('course.')->group(function () {
                    Route::resource('bundle', 'BundleController')->only(['index', 'show'])->parameters([
                        'bundle' => 'booking'
                    ]);

                    Route::prefix('course/bundle')->group(function () {
                        Route::post('{booking}/review', 'BundleController@review')->name('bundle.review');
                        Route::post('{booking}/issue', 'BundleController@issue')->name('bundle.issue');
                        Route::get('{booking}/feedback', 'BundleController@feedback')->name('bundle.feedback');
                    });
                });

                Route::resource('certification', 'CertificationController')->only(['index', 'show'])->parameters([
                    'certification' => 'booking'
                ]);

                Route::resource('certification_bundle', 'CertificationBundleController')->only(['index', 'show'])->parameters([
                    'certification_bundle' => 'booking'
                ]);

                Route::namespace ('Payment')->group(function () {
                    Route::resource('course.payment', 'CourseController')->only([
                        'index',
                        'show'
                    ])->parameters([
                                'course' => 'booking',
                            ]);
                });
            });
        });
    });
});


/**
 * Front-end pages
 */
Route::name('frontend.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::prefix('frontend')->group(function () {
            Route::name('admin.')->group(function () {
                Route::prefix('admin')->group(function () {
                    # dashboard
                    Route::view('/', 'backoffice.pages.dashboard')->name('dashboard');
                    Route::name('course.')->group(function () {
                        Route::prefix('course')->group(function () {
                            # course create form
                            Route::view('create', 'backoffice.pages.course.create')->name('create');
                            # course create form
                            Route::view('edit', 'backoffice.pages.course.edit')->name('edit');
                            Route::name('booking.')->group(function () {
                                Route::prefix('booking')->group(function () {
                                    # booking list
                                    Route::view('index', 'backoffice.pages.course.booking.index')->name('index');
                                    # booking details
                                    Route::view('show', 'backoffice.pages.course.booking.show')->name('show');
                                    # booking details
                                    Route::view('confirm-payment', 'backoffice.pages.course.booking.payment')->name('payment');
                                });
                            });

                            Route::name('face_to_face.')->group(function () {
                                Route::prefix('face-to-face')->group(function () {
                                    # face to face course list
                                    Route::view('/', 'backoffice.pages.course.face_to_face.index')->name('index');
                                });
                            });

                            Route::name('virtual.')->group(function () {
                                Route::prefix('virtual')->group(function () {
                                    # virtual course list
                                    Route::view('/', 'backoffice.pages.course.virtual.index')->name('index');
                                });
                            });

                            Route::name('elearning.')->group(function () {
                                Route::prefix('elearning')->group(function () {
                                    # face to face course list
                                    Route::view('/', 'backoffice.pages.course.elearning.index')->name('index');
                                });
                            });
                        });
                    });

                    Route::name('category.')->group(function () {
                        Route::prefix('category')->group(function () {
                            # category list
                            Route::view('/', 'backoffice.pages.category.index')->name('index');
                            # category create form
                            Route::view('create', 'backoffice.pages.category.create')->name('create');
                            # category edit form
                            Route::view('edit', 'backoffice.pages.category.edit')->name('edit');
                        });
                    });

                    Route::name('venue.')->group(function () {
                        Route::prefix('venue')->group(function () {
                            # venue list
                            Route::view('/', 'backoffice.pages.venue.index')->name('index');
                            # venue create form
                            Route::view('create', 'backoffice.pages.venue.create')->name('create');
                            # venue edit form
                            Route::view('edit', 'backoffice.pages.venue.edit')->name('edit');
                            Route::name('city.')->group(function () {
                                Route::prefix('city')->group(function () {
                                    # cities list
                                    Route::view('/', 'backoffice.pages.venue.city.index')->name('index');
                                    # city create
                                    Route::view('create', 'backoffice.pages.venue.city.create')->name('create');
                                    # city edit
                                    Route::view('edit', 'backoffice.pages.venue.city.edit')->name('edit');
                                });
                            });
                        });
                    });

                    Route::name('tour.')->group(function () {
                        Route::prefix('tour')->group(function () {
                            # tour list
                            Route::view('/', 'backoffice.pages.tour.index')->name('index');
                            # tour create form
                            Route::view('create', 'backoffice.pages.tour.create')->name('create');
                            # tour edit form
                            Route::view('edit', 'backoffice.pages.tour.edit')->name('edit');
                            Route::name('booking.')->group(function () {
                                Route::prefix('booking')->group(function () {
                                    # booking list
                                    Route::view('index', 'backoffice.pages.tour.booking.index')->name('index');
                                    # booking details
                                    Route::view('show', 'backoffice.pages.tour.booking.show')->name('show');
                                });
                            });
                        });
                    });

                    Route::name('software.')->group(function () {
                        Route::prefix('software')->group(function () {
                            # software list
                            Route::view('/', 'backoffice.pages.software.index')->name('index');
                            # software create form
                            Route::view('create', 'backoffice.pages.software.create')->name('create');
                            # software edit form
                            Route::view('edit', 'backoffice.pages.software.edit')->name('edit');
                            Route::name('order.')->group(function () {
                                Route::prefix('order')->group(function () {
                                    # software order list
                                    Route::view('/', 'backoffice.pages.software.order.index')->name('index');
                                    # software order details
                                    Route::view('show', 'backoffice.pages.software.order.show')->name('show');
                                });
                            });
                        });
                    });

                    Route::name('staff.')->group(function () {
                        Route::prefix('staff')->group(function () {
                            # staff list
                            Route::view('/', 'backoffice.pages.staff.index')->name('index');
                            # staff create form
                            Route::view('create', 'backoffice.pages.staff.create')->name('create');
                            # staff edit form
                            Route::view('edit', 'backoffice.pages.staff.edit')->name('edit');
                        });
                    });

                    Route::name('enquiry.')->group(function () {
                        Route::prefix('enquiry')->group(function () {
                            # enquiry list
                            Route::view('/', 'backoffice.pages.enquiry.index')->name('index');
                            # enquiry show page
                            Route::view('show', 'backoffice.pages.enquiry.show')->name('show');
                        });
                    });

                    Route::name('referral.')->group(function () {
                        Route::prefix('referral')->group(function () {
                            # referral list
                            Route::view('/', 'backoffice.pages.referral.index')->name('index');
                            # referral show page
                            Route::view('show', 'backoffice.pages.referral.show')->name('show');
                        });
                    });

                    Route::name('customer.')->group(function () {
                        Route::prefix('customer')->group(function () {
                            # customer list
                            Route::view('/', 'backoffice.pages.customer.index')->name('index');
                            # customer show page
                            Route::view('show', 'backoffice.pages.customer.show')->name('show');
                        });
                    });

                    Route::name('company.')->group(function () {
                        Route::prefix('company')->group(function () {
                            # company list
                            Route::view('/', 'backoffice.pages.company.index')->name('index');
                            # company edit page
                            Route::view('edit', 'backoffice.pages.company.edit')->name('edit');
                            Route::name('employee.')->group(function () {
                                Route::prefix('employee')->group(function () {
                                    # past employees
                                    Route::view('past', 'backoffice.pages.company.employee.past')->name('past');
                                    # current employees
                                    Route::view('current', 'backoffice.pages.company.employee.current')->name('current');
                                    # approved authority employees
                                    Route::view('approved-authority', 'backoffice.pages.company.employee.approved_authority')->name('approved_authority');
                                });
                            });
                        });
                    });

                    Route::name('trainer_application.')->group(function () {
                        Route::prefix('trainer-application')->group(function () {
                            # trainer application list
                            Route::view('/', 'backoffice.pages.trainer_application.index')->name('index');
                            # trainer application show page
                            Route::view('show', 'backoffice.pages.trainer_application.show')->name('show');
                        });
                    });

                    Route::view('download', 'backoffice.pages.download')->name('download');
                    Route::view('profile', 'backoffice.pages.profile')->name('profile');
                    Route::name('settings.')->group(function () {
                        Route::prefix('settings')->group(function () {
                            Route::view('', 'backoffice.pages.settings.season')->name('season');
                        });
                    });
                });
            });
        });
    });
});



/**
 * Backoffice
 */
Route::name('backoffice.')->group(function () {
    Route::middleware(['auth', 'account:staff'])->group(function () {
        Route::prefix('backoffice')->group(function () {
            Route::get('home', 'Backoffice\DashboardController@index')->name('home');
            Route::namespace ('Backoffice')->group(function () {
                Route::resource('contact', 'ContactController')->only([
                    'index',
                    'show',
                ]);

                Route::namespace ('Certification')->group(function () {
                    Route::name('certification.')->group(function () {
                        Route::prefix('certification')->group(function () {
                            Route::get('export', 'CertificationController@export')->name('export');
                            Route::get('booking/export', 'BookingController@export')->name('booking.export');
                            Route::resource('booking', 'BookingController')->only([
                                'index',
                                'show',
                                'update',
                            ]);
                            Route::resource('certifying_body', 'CertifyingBodyController')->except([
                                'create',
                                'show',
                            ]);
                            Route::get('category/export', 'CategoryController@export')->name('category.export');
                            Route::get('{category}/subcategory/export', 'SubcategoryController@export')->name('subcategory.export');
                            Route::get('{subcategory}/topic/export', 'TopicController@export')->name('topic.export');
                            Route::resource('category', 'CategoryController')->except([
                                'create',
                                'show',
                            ]);
                            Route::resource('category.subcategory', 'SubcategoryController')->except([
                                'create',
                                'show',
                            ]);
                            Route::resource('subcategory.topic', 'TopicController')->except([
                                'create',
                                'show',
                            ]);
                            Route::post('{certification}/elearning', 'ElearningController@store')->name('elearning.store');
                        });
                    });
                    Route::resource('certification', 'CertificationController')->except('show');
                    Route::resource('certification.document', 'DocumentController')->except([
                        'create',
                        'show',
                    ]);
                    Route::resource('certification.virtual', 'VirtualController')->except('show');
                    Route::resource('certification.physical', 'PhysicalController')->except('show');
                    Route::namespace ('Bundle')->group(function () {
                        Route::name('certification_bundle.')->group(function () {
                            Route::prefix('certification_bundle')->group(function () {
                                Route::get('export', 'BundleController@export')->name('export');
                                Route::get('booking/export', 'BookingController@export')->name('booking.export');
                                Route::resource('booking', 'BookingController')->only([
                                    'index',
                                    'show',
                                    'update',
                                ]);
                            });
                        });
                        Route::resource('certification_bundle', 'BundleController')->except('show')->parameters([
                            'certification_bundle' => 'bundle',
                        ]);
                        Route::resource('certification_bundle.document', 'DocumentController')->except([
                            'show',
                            'create',
                        ])->parameters([
                                    'certification_bundle' => 'bundle',
                                ]);
                        Route::post('{bundle}/elearning', 'ElearningController')->name('certification_bundle.elearning.store');
                        Route::resource('certification_bundle.physical', 'PhysicalController')->except('show')->parameters([
                            'certification_bundle' => 'bundle',
                        ]);
                        Route::resource('certification_bundle.virtual', 'VirtualController')->except('show')->parameters([
                            'certification_bundle' => 'bundle',
                        ]);
                    });
                });
                Route::namespace ('Payment')->group(function () {
                    Route::name('invoice.mail.')->group(function () {
                        Route::get('invoice/{payment}/mail', 'MailController@show')->name('show');
                        Route::post('invoice/{payment}/mail/send', 'MailController@send')->name('send');
                    });
                    Route::resource('invoice', 'InvoiceController')->parameters([
                        'invoice' => 'payment'
                    ]);
                    Route::get('registration/letter/{payment}', 'InvoiceController@invite')->name('invoice-letter');
                    Route::resource('invoice.log', 'LogController')->except('show')->parameters([
                        'invoice' => 'payment'
                    ]);
                });
                Route::namespace ('HotelReservation')->group(function () {
                    Route::get('hotel_reservation/export', 'HotelReservationController@export')->name('hotel_reservation.export');
                    Route::resource('hotel_reservation', 'HotelReservationController')->only(['index', 'show']);
                });
                Route::name('profile.')->group(function () {
                    Route::prefix('profile')->group(function () {
                        Route::get('/', 'ProfileController@edit')->name('edit');
                        Route::put('update', 'ProfileController@update')->name('update');
                    });
                });

                Route::namespace ('FAQs')->group(function () {
                    Route::resource('faqs', 'FAQController')->except(['show',]);
                });

                Route::namespace ('Course')->group(function () {
                    Route::name('course.')->group(function () {
                        Route::prefix('course')->group(function () {
                            Route::get('booking/export', 'BookingController@export')->name('booking.export');
                            Route::resource('booking', 'BookingController')->only(['index', 'show', 'update']);
                            Route::resource('calendar', 'CalendarController')->except('show');
                            Route::get('export', 'CourseController@export')->name('export');
                            Route::resource('category', 'CategoryController');
                            Route::get('category/export', 'CategoryController@export')->name('category.export');
                            Route::resource('category.subcategory', 'SubcategoryController');
                            Route::get('{category}/subcategory/export', 'SubcategoryController@export')->name('subcategory.export');
                            Route::resource('subcategory.topic', 'TopicController');
                            Route::get('{subcategory}/topic/export', 'TopicController@export')->name('topic.export');
                            Route::namespace ('Bundle')->group(function () {
                                Route::resource('certifications', 'BundleController')->except('show')->names([
                                    'index' => 'bundle.index',
                                    'create' => 'bundle.create',
                                    'store' => 'bundle.store',
                                    'edit' => 'bundle.edit',
                                    'update' => 'bundle.update',
                                    'destroy' => 'bundle.destroy',
                                ])->parameters(['certifications' => 'bundle']);
                                Route::get('certifications/export', 'BundleController@export')->name('bundle.export');
                                Route::resource('certifications.document', 'DocumentController')->except('show')->names([
                                    'index' => 'bundle.document.index',
                                    'create' => 'bundle.document.create',
                                    'store' => 'bundle.document.store',
                                    'edit' => 'bundle.document.edit',
                                    'update' => 'bundle.document.update',
                                    'destroy' => 'bundle.document.destroy',
                                ])->parameters(['certifications' => 'bundle']);
                                Route::resource('certifications.face-to-face', 'PhysicalBundleController')->except('show')->names([
                                    'index' => 'bundle.physical.index',
                                    'create' => 'bundle.physical.create',
                                    'store' => 'bundle.physical.store',
                                    'edit' => 'bundle.physical.edit',
                                    'update' => 'bundle.physical.update',
                                    'destroy' => 'bundle.physical.destroy',
                                ])->parameters([
                                            'certifications' => 'bundle',
                                            'face-to-face' => 'physical_bundle',
                                        ]);
                                Route::resource('certifications.virtual', 'VirtualBundleController')->except('show')->names([
                                    'index' => 'bundle.virtual.index',
                                    'create' => 'bundle.virtual.create',
                                    'store' => 'bundle.virtual.store',
                                    'edit' => 'bundle.virtual.edit',
                                    'update' => 'bundle.virtual.update',
                                    'destroy' => 'bundle.virtual.destroy',
                                ])->parameters([
                                            'certifications' => 'bundle',
                                            'virtual' => 'virtual_bundle',
                                        ]);
                                Route::post('certifications/{bundle}/elearning', 'ElearningBundleController')->name('bundle.elearning.store');
                            });
                        });
                    });

                    Route::resource('course', 'CourseController')->except([
                        'show',
                    ]);
                    Route::get('/course-custom-bookings', 'CourseController@course_custom_bookings')->name('custom-course-bookings');
                    Route::resource('course.document', 'DocumentController')->except('show');
                    Route::resource('course.physical_class', 'PhysicalClassController')->except('show');
                    Route::resource('course.virtual_class', 'VirtualClassController')->except('show');
                    Route::resource('course.elearning_class', 'ElearningClassController')->only('store');
                });
                Route::namespace ('Software')->group(function () {
                    Route::resource('software', 'SoftwareController')->except('show');
                    Route::name('software.')->group(function () {
                        Route::prefix('software')->group(function () {
                            Route::get('export', 'SoftwareController@export')->name('export');
                            Route::resource('category', 'CategoryController')->except('show');
                            Route::get('category/export', 'CategoryController@export')->name('category.export');
                            Route::resource('category.subcategory', 'SubcategoryController')->except('show');
                            Route::get('{category}/subcategory/export', 'SubcategoryController@export')->name('subcategory.export');
                            Route::get('quote', 'QuotationController@index')->name('quote.index');
                            Route::get('quote/export', 'QuotationController@export')->name('quote.export');
                            Route::get('quote/{quotation}', 'QuotationController@show')->name('quote.show');
                        });
                    });
                });

                Route::namespace ('Tour')->group(function () {
                    Route::name('tour.')->group(function () {
                        Route::prefix('tour')->group(function () {
                            Route::get('export', 'TourController@export')->name('export');
                            Route::get('{tour}/booking/export', 'TourBookingController@export')->name('booking.export');
                            Route::get('category/export', 'CategoryController@export')->name('category.export');
                            Route::resource('category', 'CategoryController');
                            Route::resource('category.subcategory', 'SubcategoryController')->except('show');
                            Route::get('{category}/subcategory/export', 'SubcategoryController@export')->name('subcategory.export');
                        });
                    });

                    Route::resource('tour', 'TourController')->except('show');
                    Route::resource('tour.booking', 'TourBookingController')->only(['index', 'show']);
                    Route::resource('tour.document', 'DocumentController')->except('show');
                    Route::resource('tour.schedule', 'ScheduleController')->except([
                        'show',
                        'create',
                    ]);
                });

                Route::namespace ('Venue')->group(function () {
                    Route::name('venue.')->group(function () {
                        Route::prefix('venue')->group(function () {
                            Route::get('export', 'VenueController@export')->name('export');
                            Route::get('{venue}/city/export', 'CityController@export')->name('city.export');
                            Route::get('{venue}/currency/export', 'CurrencyController@export')->name('currency.export');
                        });
                    });

                    Route::resource('venue', 'VenueController');
                    Route::resource('venue.city', 'CityController')->except('show');
                    Route::resource('venue.currency', 'CurrencyController')->except('show');
                });

                Route::namespace ('VirtualVenue')->group(function () {
                    Route::resource('virtual_venue', 'VirtualVenueController')->only([
                        'create',
                        'store',
                    ]);

                    Route::resource('virtual_venue.currency', 'CurrencyController')->except('show')->parameters([
                        'virtual_venue' => 'venue',
                    ]);
                });

                Route::namespace ('Staff')->group(function () {
                    Route::get('staff/export', 'StaffController@export')->name('staff.export');
                    Route::resource('staff', 'StaffController')->except('show');
                    # assign role to staff
                    Route::post('assign-role/{user}', 'StaffController@assignRole')->name('assignRole');
                    # invoke role from user
                    Route::delete('invoke-role/{user}', 'StaffController@removeRole')->name('removeRole');
                });

                Route::namespace ('Currency')->group(function () {
                    Route::get('currency/export', 'CurrencyController@export')->name('currency.export');
                    Route::resource('currency', 'CurrencyController')->except('show');
                });

                Route::namespace ('TrainerApplication')->group(function () {
                    Route::name('trainer_application.')->group(function () {
                        Route::prefix('trainer_application')->group(function () {
                            Route::get('{trainer_application}/resume', 'TrainerApplicationController@resume')->name('resume');
                            Route::get('export', 'TrainerApplicationController@export')->name('export');
                        });
                    });

                    Route::resource('trainer_application', 'TrainerApplicationController')->only([
                        'show',
                        'index',
                    ]);
                });

                Route::namespace ('Download')->group(function () {
                    Route::name('download.')->group(function () {
                        Route::prefix('download')->group(function () {
                            Route::get('export', 'DownloadController@export')->name('export');
                            Route::get('index', 'DownloadController@index')->name('index');
                        });
                    });
                });

                Route::namespace ('Enquiry')->group(function () {
                    Route::get('enquiry/export', 'EnquiryController@export')->name('enquiry.export');
                    Route::resource('enquiry', 'EnquiryController')->only(['index', 'show']);
                });

                Route::namespace ('Referral')->group(function () {
                    Route::get('referral/export', 'ReferralController@export')->name('referral.export');
                    Route::resource('referral', 'ReferralController')->only(['index', 'show']);
                });

                Route::namespace ('Customer')->group(function () {
                    Route::get('customer/export', 'CustomerController@export')->name('customer.export');
                    Route::resource('customer', 'CustomerController');
                });

                Route::namespace ('Review')->group(function () {
                    Route::name('review.')->group(function () {
                        Route::prefix('review')->group(function () {
                            Route::resource('course', 'CourseController')->only([
                                'index',
                                'show',
                            ])->parameters(['course' => 'review']);
                            Route::resource('certification', 'CourseBundleController')->only([
                                'index',
                                'show',
                            ])->parameters(['certification' => 'review']);
                            Route::resource('tour', 'TourController')->only([
                                'index',
                                'show',
                            ])->parameters(['tour' => 'review']);
                        });
                    });

                    Route::get('review/export', 'ReviewController@export')->name('review.export');
                    Route::resource('review', 'ReviewController')->only(['index', 'show']);
                });

                Route::name('season.')->group(function () {
                    Route::prefix('season')->group(function () {
                        Route::get('/', 'SeasonController@edit')->name('edit');
                        Route::put('update', 'SeasonController@update')->name('update');
                    });
                });

                Route::name('about.')->group(function () {
                    Route::prefix('about')->group(function () {
                        Route::get('sections', 'AboutPageController@create_section')->name('sections');
                        Route::post('sections', 'AboutPageController@store_section')->name('sections.store');
                        Route::get('sections/{section}', 'AboutPageController@edit_section')->name('sections.edit');
                        Route::put('sections/{section}', 'AboutPageController@update_section')->name('sections.update');
                        Route::delete('sections/{section}', 'AboutPageController@destroy_section')->name('sections.destroy');
                        Route::name('history.')->group(function () {
                            Route::get('history', 'AboutPageController@create_history')->name('index');
                            Route::post('history', 'AboutPageController@store_history')->name('store');
                            Route::get('history/{history}', 'AboutPageController@edit_history')->name('edit');
                            Route::put('history/{history}', 'AboutPageController@update_history')->name('update');
                            Route::delete('history/{history}', 'AboutPageController@destroy_history')->name('destroy');
                        });

                        Route::name('values.')->group(function () {
                            Route::get('values', 'AboutPageController@create_value')->name('index');
                            Route::post('values', 'AboutPageController@store_value')->name('store');
                            Route::get('values/{values}', 'AboutPageController@edit_value')->name('edit');
                            Route::put('values/{values}', 'AboutPageController@update_value')->name('update');
                            Route::delete('values/{values}', 'AboutPageController@destroy_value')->name('destroy');
                        });
                    });
                });

                Route::namespace ('TrainerIssue')->group(function () {
                    Route::name('trainer_issue.')->group(function () {
                        Route::prefix('trainer_issue')->group(function () {
                            Route::patch('{trainer_issue}/resolve', 'TrainerIssueController@resolve')->name('resolve');
                            Route::get('export', 'TrainerIssueController@export')->name('export');
                        });
                    });

                    Route::resource('trainer_issue', 'TrainerIssueController')->only(['index', 'show']);
                });

                Route::namespace ('Company')->group(function () {
                    Route::name('company.')->group(function () {
                        Route::prefix('company')->group(function () {
                            Route::get('export', 'CompanyController@export')->name('export');
                            Route::name('employee.')->group(function () {
                                Route::prefix('{company}/employee')->group(function () {
                                    Route::get('{status}', 'EmployeeController@index')->name('index');
                                    Route::get('{status}/export', 'EmployeeController@export')->name('export');
                                });
                            });

                            Route::name('approved_authority.')->group(function () {
                                Route::prefix('{company}/approved_authority')->group(function () {
                                    Route::get('/', 'ApprovedAuthorityController@index')->name('index');
                                    Route::get('export', 'ApprovedAuthorityController@export')->name('export');
                                });
                            });
                        });
                    });

                    Route::resource('company', 'CompanyController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                    Route::resource('branches', 'OfficeController')->only(['update', 'store', 'destroy', 'edit']);
                    Route::name('company.')->group(function () {
                        Route::prefix('company')->group(function () {
                            Route::get('/confirmed', 'CompanyController@confirmedCompanies')->name('confirmed');
                        });
                    });
                });

                Route::namespace ('Project')->group(function () {
                    Route::resource('projects', 'ProjectController')->only(['index', 'edit', 'update', 'store', 'destroy']);
                    Route::get('projects/{company}/create', 'ProjectController@create')->name('projects.create');
                });

                Route::namespace ('Industry')->group(function () {
                    Route::resource('industries', 'IndustryController');
                    Route::resource('segments', 'SegmentController');
                    Route::resource('sectors', 'SectorController');
                    Route::resource('sub-sectors', 'SubSectorController');
                    Route::get('/subsector-companies/{subSector}', 'SubSectorController@companies')->name('subsector-companies');
                    Route::get('/segment-companies/{segment}', 'SegmentController@companies')->name('segment-companies');
                    Route::get('/sector-companies/{sector}', 'SectorController@companies')->name('sector-companies');
                });

                Route::namespace ('Programs')->name('programs.')->group(function () {
                    Route::resource('programs', 'ProgramsController');
                    Route::resource('modules', 'ModuleController');
                    Route::resource('bookings', 'ProgramBookingsController');
                    Route::get('/{program}/modules', 'ProgramModuleController@create')->name('programmodule');
                    Route::post('/{program}/modules', 'ProgramModuleController@store')->name('add.programmodule');
                    Route::delete('/program-modules/{programModule}', 'ProgramModuleController@destroy')->name('delete.program-module');
                    Route::get('/program-modules/{programModule}', 'ProgramModuleController@edit')->name('edit.program-module');
                    Route::patch('/program-modules/{programModule}', 'ProgramModuleController@update')->name('update.program-module');
                    Route::get('/{program}/sessions', 'SessionController@create')->name('session');
                    Route::post('/{program}/sessions', 'SessionController@store')->name('add.session');
                    Route::delete('/sessions/{session}', 'SessionController@destroy')->name('delete.session');
                    Route::get('/sessions/{session}', 'SessionController@edit')->name('edit.session');
                    Route::patch('/sessions/{session}', 'SessionController@update')->name('update.session');
                    Route::get('/{program}/intakes', 'IntakeController@create')->name('intake');
                    Route::post('/{program}/intakes', 'IntakeController@store')->name('add.intake');
                    Route::delete('/intakes/{intake}', 'IntakeController@destroy')->name('delete.intake');
                    Route::get('/intakes/{intake}', 'IntakeController@edit')->name('edit.intake');
                    Route::patch('/intakes/{intake}', 'IntakeController@update')->name('update.intake');
                    Route::get('/{program}/prices', 'PriceController@create')->name('price');
                    Route::post('/{program}/prices', 'PriceController@store')->name('add.price');
                    Route::delete('/prices/{price}', 'PriceController@destroy')->name('delete.price');
                    Route::get('/prices/{price}', 'PriceController@edit')->name('edit.price');
                    Route::patch('/prices/{price}', 'PriceController@update')->name('update.price');
                    Route::get('/brochure-downloads', 'ProgramsController@downloads')->name('brochures');
                    Route::get('/tech-stacks', 'TechStackController@index')->name('techStack');
                    Route::post('/tech-stacks', 'TechStackController@store')->name('techStack.store');
                    Route::delete('/tech-stacks', 'TechStackController@destory')->name('techStack.destory');
                });

                Route::namespace ('Role')->group(function () {
                    Route::resource('roles', 'RolesController');
                    Route::resource('permissions', 'PermissionsController');
                    Route::resource('roles-permissions', 'RolesController');
                    # assign permission to role
                    Route::post('permission-role/{role}', 'RolesController@assignPermission')->name('assignPermission');
                    # delete permission from role
                    Route::delete('permission-role/{role}', 'RolesController@invokePermission')->name('invokePermission');
                });

                Route::namespace ('ProductsConfig')->group(function () {
                    Route::resource('product-types', 'ProductTypeController');
                    Route::resource('bcg-levels', 'BCGLevelController');
                    Route::resource('pdc-stages', 'PDCStageController');
                    Route::resource('skill-types', 'SkillTypeController');
                    Route::resource('skill-levels', 'SkillLevelController');
                    Route::resource('target-staff', 'TargetStaffController');
                });

                Route::namespace ('Service')->group(function () {
                    Route::resource('services', 'ServiceController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                    Route::get('/{service}/tools/create', 'ServiceToolController@create')->name('service.tool');
                    Route::post('/{service}/tools', 'ServiceToolController@store')->name('service.add.tool');
                    Route::delete('/tools/{tool}', 'ServiceToolController@destroy')->name('service.delete.tool');
                    Route::get('/tools/{tool}', 'ServiceToolController@edit')->name('service.edit.tool');
                    Route::patch('/tools/{tool}', 'ServiceToolController@update')->name('service.update.tool');
                    Route::resource('capabilities', 'ServiceCapabilityController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                    Route::resource('service_industries', 'ServiceIndustryController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                    Route::get('services/enquiries', 'ServiceController@enquiries')->name('enquiries');
                    Route::get('services/enquiries/{enquiry}', 'ServiceController@enquiry')->name('view-enquiry');
                });

                Route::namespace ('Course')->group(function () {
                    Route::get('course-schedules', 'CourseController@schedules')->name('course-schedules');
                });

                Route::namespace ('LandingPage')->group(function () {
                    Route::resource('landing-pages', 'LandingPageController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                    Route::resource('features', 'FeaturesController')->only(['create', 'edit', 'update', 'store', 'destroy']);
                    Route::resource('testimonials', 'TestimonialController')->only(['create', 'edit', 'update', 'store', 'destroy']);
                });
                
                Route::namespace('ProjectPage')->group( function () {
                    Route::resource('project-pages', 'ProjectPageController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                    Route::prefix('project-pages')->group(function(){
                        Route::put('gallery/{id}','ProjectPhotoController@update')->name('project-pages.gallery.update');
                        Route::delete('gallery/{id}','ProjectPhotoController@destroy')->name('project-pages.gallery.destroy');

                        Route::put('collaborates/{id}','OrganisationController@update')->name('project-pages.collaborates.update');
                        Route::delete('collaborates/{id}','OrganisationController@destroy')->name('project-pages.collaborates.destroy');
                    
                    });
                    //Route::resource('features', 'FeaturesController')->only(['create', 'edit', 'update', 'store', 'destroy']);
                    //Route::resource('testimonials', 'TestimonialController')->only(['create', 'edit', 'update', 'store', 'destroy']);
                });
                
                Route::namespace('CareerModule')->group( function () {
                    Route::resource('career-modules', 'CareerModuleController')->only(['create', 'index', 'edit', 'update', 'store', 'destroy']);
                });
            });

            Route::get('custom-bookings', 'CustomFormController@index')->name('custom-bookings');
            Route::get('custom-bookings/{booking}', 'CustomFormController@invoice')->name('custom.invoice');
        });
    });
});

Auth::routes(['register' => false]);

Route::get('/landing-pages', 'HomeController@pages')->name('pages');
Route::get('/{slug}', 'HomeController@landingPage')->name('landing-page');
#download gis brochure file
Route::get('/storage/catalogues/{filename}', function ($filename) {
    $file = asset('storage/catalogues/' . $filename);
    if (file_exists($file)) {
        return response()->download($file);
    }
})->name('file.download');

Route::post('/enquiries/{subcategory}', 'CategoryEnquiryController@enquiry')->name('category.enquiry');
Route::get('/gdpr-data-privacy-protection-cyber-security/', 'CustomFormController@create')->name('custom-form');
Route::post('/gdpr-data-privacy-protection-cyber-security/', 'CustomFormController@store')->name('custom-store');
Route::post('/custom-course-booking/{course}', 'CustomizeDateController@store')->name('custom-course-booking');


Route::fallback(function () {
    return abort('404');
});




// Route::get('data-services', [DataServicesController::class, 'view'])->name('data-services');
// Route::get('e-learning', [ELearningController::class, 'view'])->name('e-learning');
// Route::get('e-commerece', [ECommereceController::class, 'view'])->name('e-commerece');
// Route::get('services', [ServicesController::class, 'view'])->name('services');
// Route::get('tech-engineering', [TechEngineeringController::class, 'view'])->name('tech-engineering');
// Route::get('media', [MediaController::class, 'view'])->name('media');
// Route::get('industries', [IndustriesController::class, 'view'])->name('industries');
// Route::get('training-consultataion', [TrainingConsultationController::class, 'view'])->name('training-consultataion');



