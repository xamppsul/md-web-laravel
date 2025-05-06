<!-- Menu Navigation starts -->
<nav>
    <div class="app-logo">
        <a class="logo d-inline-block" href="{{ __('index') }}">
            <img src="{{ asset('../assets/images/logo/1.png') }}" alt="#">
        </a>

        <span class="bg-light-primary toggle-semi-nav">
            <i class="ti ti-chevrons-right f-s-20"></i>
        </span>
    </div>
    <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
            <li class="menu-title">
                <span>Dashboard</span>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#dashboard">
                    <i class="iconoir-home-alt"></i>
                    dashboard
                    <span class="badge text-primary-dark bg-primary-300  badge-notification ms-2">4</span>
                </a>
                <ul class="collapse" id="dashboard">
                    <li><a href="{{ __('index') }}">Project</a></li>
                    <li><a href="{{ __('ecommerce_dashboard') }}">Ecommerce</a></li>
                </ul>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#apps">
                    <i class="iconoir-apple-shortcuts"></i>
                    Apps
                </a>
                <ul class="collapse" id="apps">
                    <li><a href="{{ __('calendar') }}">Calender</a></li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#Profile-page">
                            Profile
                        </a>
                        <ul class="collapse" id="Profile-page">
                            <li><a href="{{ __('profile') }}">Profile</a></li>
                            <li><a href="{{ __('setting') }}">Setting</a></li>
                        </ul>
                    </li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#projects-page">
                            Projects Page
                        </a>
                        <ul class="collapse" id="projects-page">
                            <li><a href="{{ __('project_app') }}">projects</a></li>
                            <li><a href="{{ __('project_details') }}">projects Details</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ __('to_do') }}">To-Do</a></li>
                    <li><a href="{{ __('team') }}">Team</a></li>
                    <li><a href="{{ __('api') }}">API</a></li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#ticket-page">
                            Ticket
                        </a>
                        <ul class="collapse" id="ticket-page">
                            <li><a href="{{ __('ticket') }}">Ticket</a></li>
                            <li><a href="{{ __('ticket_details') }}">Ticket Details</a></li>
                        </ul>
                    </li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#email-page">
                            Email Page
                        </a>
                        <ul class="collapse" id="email-page">
                            <li><a href="{{ __('email') }}"> Email</a></li>
                            <li><a href="{{ __('read_email') }}">Read Email</a></li>
                        </ul>
                    </li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#e-shop">
                            E-shop
                        </a>
                        <ul class="collapse" id="e-shop">
                            <li><a href="{{ __('cart') }}">Cart</a></li>
                            <li><a href="{{ __('product') }}">Product</a></li>
                            <li><a href="{{ __('add_product') }}">Add Product</a></li>
                            <li><a href="{{ __('product_details') }}">Product-Details</a></li>
                            <li><a href="{{ __('product_list') }}">Product list</a></li>
                            <li><a href="{{ __('orders') }}">Orders</a></li>
                            <li><a href="{{ __('order_details') }}">Order Details</a></li>
                            <li><a href="{{ __('order_list') }}">Orders List</a></li>
                            <li><a href="{{ __('checkout') }}">Check out</a></li>
                            <li><a href="{{ __('wishlist') }}">Wishlist</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ __('invoice') }}">Invoice</a></li>
                    <li><a href="{{ __('chat') }}">Chat</a></li>
                    <li><a href="{{ __('file_manager') }}">File manager</a></li>
                    <li><a href="{{ __('bookmark') }}">Bookmark</a></li>
                    <li><a href="{{ __('kanban_board') }}">Kanban board</a></li>
                    <li><a href="{{ __('timeline') }}">Timeline</a></li>
                    <li><a href="{{ __('faq') }}">FAQS</a></li>
                    <li><a href="{{ __('pricing') }}">Pricing</a></li>
                    <li><a href="{{ __('gallery') }}">Gallery</a></li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#blog-page">
                            Blog Page
                        </a>
                        <ul class="collapse" id="blog-page">
                            <li><a href="{{ __('blog') }}">Blog</a></li>
                            <li><a href="{{ __('blog_details') }}">Blog Details</a></li>
                            <li><a href="{{ __('add_blog') }}">Add Blog</a></li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li class="no-sub">
                <a class="" href="{{ __('widget') }}">
                    <i class="iconoir-view-grid"></i> Widgets
                </a>
            </li>

            <li class="menu-title"><span>Component</span></li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#ui-kits">

                    <i class="iconoir-handbag"></i>
                    UI kits
                </a>
                <ul class="collapse" id="ui-kits">
                    <li><a href="{{ __('cheatsheet') }}">Cheatsheet</a></li>
                    <li><a href="{{ __('alert') }}">Alert</a></li>
                    <li><a href="{{ __('badges') }}">Badges</a></li>
                    <li><a href="{{ __('buttons') }}">Buttons</a></li>
                    <li><a href="{{ __('cards') }}">Cards</a></li>
                    <li><a href="{{ __('dropdown') }}">Dropdown</a></li>
                    <li><a href="{{ __('grid') }}">Grid</a></li>
                    <li><a href="{{ __('avatar') }}">Avatar</a></li>
                    <li><a href="{{ __('tabs') }}">Tabs</a></li>
                    <li><a href="{{ __('accordions') }}">Accordions</a></li>
                    <li><a href="{{ __('progress') }}">Progress</a></li>
                    <li><a href="{{ __('notifications') }}">Notifications</a></li>
                    <li><a href="{{ __('list') }}">Lists</a></li>
                    <li><a href="{{ __('helper_classes') }}">Helper Classes</a></li>
                    <li><a href="{{ __('background') }}">Background</a></li>
                    <li><a href="{{ __('divider') }}">Divider</a></li>
                    <li><a href="{{ __('ribbons') }}">Ribbons</a></li>
                    <li><a href="{{ __('editor') }}">Editor </a></li>
                    <li><a href="{{ __('collapse') }}">Collapse</a></li>
                    <li><a href="{{ __('footer_page') }}">Footer</a></li>
                    <li><a href="{{ __('shadow') }}">Shadow</a></li>
                    <li><a href="{{ __('wrapper') }}">Wrapper</a></li>
                    <li><a href="{{ __('bullet') }}">Bullet</a></li>
                    <li><a href="{{ __('placeholder') }}">Placeholder</a></li>
                    <li><a href="{{ __('alignment') }}">Alignment Thing</a></li>
                </ul>
            </li>


            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#advance-ui">
                    <i class="iconoir-shopping-bag-plus"></i> Advance UI
                    <span class="badge text-warning-dark bg-warning-400 badge-notification ms-2">
                        12+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <ul class="collapse" id="advance-ui">
                    <li><a href="{{ __('modals') }}">Modals</a></li>
                    <li><a href="{{ __('offcanvas') }}">Offcanvas Toggle</a></li>
                    <li><a href="{{ __('sweetalert') }}">Sweat Alert</a></li>
                    <li><a href="{{ __('scrollbar') }}">Scrollbar</a></li>
                    <li><a href="{{ __('spinners') }}">Spinners</a></li>
                    <li><a href="{{ __('animation') }}">Animation</a></li>
                    <li><a href="{{ __('video_embed') }}">Video Embed</a></li>
                    <li><a href="{{ __('tour') }}">Tour</a></li>
                    <li><a href="{{ __('slick_slider') }}">Slider</a></li>
                    <li><a href="{{ __('bootstrap_slider') }}">Bootstrap Slider</a></li>
                    <li><a href="{{ __('scrollpy') }}">Scrollpy</a></li>
                    <li><a href="{{ __('tooltips_popovers') }}">Tooltip & Popovers</a></li>
                    <li><a href="{{ __('ratings') }}">Rating</a></li>
                    <li><a href="{{ __('prismjs') }}">Prismjs</a></li>
                    <li><a href="{{ __('count_down') }}">Count Down</a></li>
                    <li><a href="{{ __('count_up') }}"> Count up </a></li>
                    <li><a href="{{ __('draggable') }}">Draggable</a></li>
                    <li><a href="{{ __('tree-view') }}">Tree View</a></li>
                    <li><a href="{{ __('block_ui') }}">Block Ui </a></li>
                </ul>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#icons">
                    <i class="iconoir-component"></i> Icons
                </a>
                <ul class="collapse" id="icons">
                    <li><a href="{{ __('fontawesome') }}">Fontawesome</a></li>
                    <li><a href="{{ __('flag_icons') }}">Flag</a></li>
                    <li><a href="{{ __('tabler_icons') }}">Tabler</a></li>
                    <li><a href="{{ __('weather_icon') }}">Weather</a></li>
                    <li><a href="{{ __('animated_icon') }}">Animated</a></li>
                    <li><a href="{{ __('iconoir_icon') }}">Iconoir</a></li>
                    <li><a href="{{ __('phosphor') }}">Phosphor</a></li>
                </ul>
            </li>
            <li class="no-sub">
                <a class="" href="{{ __('misc') }}">
                    <i class="iconoir-bookmark-book"></i> Misc
                </a>
            </li>
            <li class="menu-title"><span>Map & Charts </span></li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#maps">
                    <i class="iconoir-map"></i> Map
                </a>
                <ul class="collapse" id="maps">
                    <li><a href="{{ __('google_map') }}">Google Maps</a></li>
                    <li><a href="{{ __('leaflet_map') }}">Leaflet map</a></li>
                    <li><a href="{{ __('vector_map') }}">Vector map</a></li>
                </ul>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#chart">
                    <i class="iconoir-lifebelt"></i> Chart
                </a>
                <ul class="collapse" id="chart">


                    <li><a href="{{ __('chart_js') }}">Chart js</a></li>


                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#apexcharts-page">
                            Apexcharts
                        </a>
                        <ul class="collapse" id="apexcharts-page">
                            <li><a href="{{ __('line_chart') }}">Line</a></li>
                            <li><a href="{{ __('area_chart') }}">Area</a></li>
                            <li><a href="{{ __('column_chart') }}">Column</a></li>
                            <li><a href="{{ __('bar_chart') }}">Bar</a></li>
                            <li><a href="{{ __('mixed_chart') }}">Mixed</a></li>
                            <li><a href="{{ __('timeline_range_charts') }}">Timeline & Range-Bars</a></li>
                            <li><a href="{{ __('candlestick_chart') }}">Candlestick</a></li>
                            <li><a href="{{ __('boxplot_chart') }}">Boxplot</a></li>
                            <li><a href="{{ __('bubble_chart') }}">Bubble</a></li>
                            <li><a href="{{ __('scatter_chart') }}">Scatter</a></li>
                            <li><a href="{{ __('heatmap') }}">Heatmap</a></li>
                            <li><a href="{{ __('treemap_chart') }}">Treemap</a></li>
                            <li><a href="{{ __('pie_charts') }}">Pie</a></li>
                            <li><a href="{{ __('radial_bar_chart') }}">Radial bar</a></li>
                            <li><a href="{{ __('radar_chart') }}">Radar</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="menu-title"><span>Table & forms </span></li>

            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#table">
                    <i class="iconoir-layout-right"></i> Table
                </a>
                <ul class="collapse" id="table">
                    <li><a href="{{ __('basic_table') }}">BasicTable</a></li>
                    <li><a href="{{ __('data_table') }}">Data Table</a></li>
                    <li><a href="{{ __('list_table') }}">List Js</a></li>
                    <li><a href="{{ __('advance_table') }}">Advance Table</a></li>
                </ul>
            </li>


            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#forms">
                    <i class="iconoir-archive"></i> Forms elements
                </a>
                <ul class="collapse" id="forms">
                    <li><a href="{{ __('form_validation') }}">Form Validation</a></li>
                    <li><a href="{{ __('base_inputs') }}">Base Input</a></li>
                    <li><a href="{{ __('checkbox_radio') }}">Checkbox & Radio</a></li>
                    <li><a href="{{ __('input_groups') }}">Input Groups</a></li>
                    <li><a href="{{ __('input_masks') }}">Input Masks</a></li>
                    <li><a href="{{ __('floating_labels') }}">Floating Labels</a></li>
                    <li><a href="{{ __('date_picker') }}">Datetimepicker</a></li>
                    <li><a href="{{ __('touch_spin') }}">Touchspin</a></li>
                    <li><a href="{{ __('select') }}">Select2</a></li>
                    <li><a href="{{ __('switch') }}">Switch</a></li>
                    <li><a href="{{ __('range_slider') }}">Range Slider</a></li>
                    <li><a href="{{ __('typeahead') }}">Typeahead</a></li>
                    <li><a href="{{ __('textarea') }}">Textarea</a></li>
                    <li><a href="{{ __('clipboard') }}">Clipboard</a></li>
                    <li><a href="{{ __('file_upload') }}">File Upload</a></li>
                    <li><a href="{{ __('dual_list_boxes') }}">Dual List Boxes</a></li>
                    <li><a href="{{ __('default_forms') }}">Default Forms</a></li>
                </ul>
            </li>

            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#ready_to_use">
                    <i class="iconoir-report-columns"></i>
                    Ready to use <span
                        class="badge text-success-dark bg-success-400 badge-notification ms-2">New</span>
                </a>
                <ul class="collapse" id="ready_to_use">
                    <li><a href="{{ __('form_wizards') }}">Form wizards</a></li>
                    <li><a href="{{ __('form_wizard_1') }}">Form wizards 1</a></li>
                    <li><a href="{{ __('form_wizard_2') }}">Form wizards 2</a></li>
                    <li><a href="{{ __('ready_to_use_form') }}">Ready To Use Form</a></li>
                    <li><a href="{{ __('ready_to_use_table') }}">Ready To Use Tables</a></li>
                </ul>
            </li>

            <li class="menu-title"><span>Pages</span></li>

            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#auth_pages">
                    <i class="ph-duotone  ph-notebook"></i> Auth Pages
                </a>
                <ul class="collapse" id="auth_pages">
                    <li><a href="{{ __('sign_in') }}">Sign In</a></li>
                    <li><a href="{{ __('sign_in_1') }}">Sign In with Bg-image</a></li>
                    <li><a href="{{ __('sign_up') }}">Sign Up</a></li>
                    <li><a href="{{ __('sign_up_1') }}">Sign Up with Bg-image</a></li>
                    <li><a href="{{ __('password_reset') }}">Password Reset</a></li>
                    <li><a href="{{ __('password_reset_1') }}">Password Reset with Bg-image</a></li>
                    <li><a href="{{ __('password_create') }}">Password Create</a></li>
                    <li><a href="{{ __('password_create_1') }}">Password Create with Bg-image</a></li>
                    <li><a href="{{ __('lock_screen') }}">Lock Screen</a></li>
                    <li><a href="{{ __('lock_screen_1') }}">Lock Screen with Bg-image</a></li>
                    <li><a href="{{ __('two_step_verification') }}">Two-Step Verification</a></li>
                    <li><a href="{{ __('two_step_verification_1') }}">Two-Step Verification with Bg-image</a></li>
                </ul>
            </li>
            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#error_pages">
                    <i class="iconoir-warning-triangle"></i> Error Pages
                </a>
                <ul class="collapse" id="error_pages">
                    <li><a href="{{ __('error_400') }}">Bad Request </a></li>
                    <li><a href="{{ __('error_403') }}">Forbidden </a></li>
                    <li><a href="{{ __('error_404') }}">Not Found</a></li>
                    <li><a href="{{ __('error_500') }}">Internal Server</a></li>
                    <li><a href="{{ __('error_503') }}">Service Unavailable</a></li>
                </ul>
            </li>

            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#other_pages">
                    <i class="iconoir-multiple-pages"></i> Other Pages
                </a>
                <ul class="collapse" id="other_pages">
                    <li><a href="{{ __('blank') }}">Blank</a></li>
                    <li><a href="{{ __('maintenance') }}">Maintenance</a></li>
                    <li><a href="{{ __('landing') }}">Landing Page</a></li>
                    <li><a href="{{ __('coming_soon') }}">Coming Soon</a></li>
                    <li><a href="{{ __('sitemap') }}">Sitemap</a></li>
                    <li><a href="{{ __('privacy_policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ __('terms_condition') }}">Terms &amp; Condition</a></li>
                </ul>
            </li>

            <li class="menu-title"><span>Others</span></li>

            <li>
                <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#level">
                    <i class="iconoir-keyframes-couple"></i> 2 level
                </a>
                <ul class="collapse" id="level">
                    <li><a href="'#">Blank</a></li>
                    <li class="another-level">
                        <a aria-expanded="false" class="" data-bs-toggle="collapse" href="#level2">
                            Another level
                        </a>
                        <ul class="collapse" id="level2">
                            <li><a href="{{ __('blank') }}">Blank</a></li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="no-sub">
                <a class="" href="mailto:teqlathemes@gmail.com">
                    <i class="iconoir-chat-bubble-question"></i> Support
                </a>
            </li>


        </ul>
    </div>

    <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
    </div>

</nav>
<!-- Menu Navigation ends -->
