  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              {{-- categories  --}}
              @can('categories')
                  <li class=" nav-item"><a href="#"><i class="la la-archive"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.categories') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.categories.create') }}" data-i18n="">
                                  {{ __('keywords.create_category') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.categories.index') }}"
                                  data-i18n="">{{ __('keywords.categories') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan

                            @can('products')
                  <li class=" nav-item"><a href="#"><i class="la la-cubes"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.products') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.products.create') }}" data-i18n="">
                                  {{ __('keywords.create_product') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.products.index') }}"
                                  data-i18n="">{{ __('keywords.products') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan


              {{-- brand managment --}}
              @can('brands')
                  <li class=" nav-item"><a href="#"><i class="la la-tags"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.brands') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.brands.create') }}" data-i18n="">
                                  {{ __('keywords.create_brand') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.brands.index') }}"
                                  data-i18n="">{{ __('keywords.brands') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan

              {{-- user managment --}}
              @can('users')
                  <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.users') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.users.create') }}" data-i18n="">
                                  {{ __('keywords.create_user') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.users.index') }}"
                                  data-i18n="">{{ __('keywords.users') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan


              @can('coupons')
                  <li class=" nav-item"><a href="#"><i class="la la-ticket"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.coupons') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.coupons.create') }}" data-i18n="">
                                  {{ __('keywords.create_coupon') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.coupons.index') }}"
                                  data-i18n="">{{ __('keywords.coupons') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan

              @can('faqs')
                  <li class=" nav-item"><a href="#"><i class="la la-question"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.faqs') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.faqs.create') }}" data-i18n="">
                                  {{ __('keywords.create_faq') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.faqs.index') }}"
                                  data-i18n="">{{ __('keywords.faqs') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan



              @can('roles')
                  <li class=" nav-item"><a href="#"><i class="la la-unlock-alt"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.roles') }}</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.roles.create') }}" data-i18n="">
                                  {{ __('keywords.create_role') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.roles.index') }}"
                                  data-i18n="">{{ __('keywords.roles') }} </a>
                          </li>
                      </ul>
                  </li>
              @endcan

              @can('admins')
                  <li class=" nav-item"><a href="#"><i class="la la-user-secret"></i><span class="menu-title"
                              data-i18n="nav.templates.main">{{ __('keywords.admins') }}</span><span
                              class="badge badge badge-info badge-pill float-right mr-2">1</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.admins.create') }}"
                                  data-i18n="">{{ __('keywords.create_admin') }} </a>
                          </li>
                          <li>
                              <a class="menu-item" href="{{ route('admin.admins.index') }}"
                                  data-i18n="">{{ __('keywords.admins') }}</a>
                          </li>
                      </ul>
                  </li>
              @endcan

              @can('global_shipping')
                  <li class=" nav-item"><a href="#"><i class="la la-truck"></i><span class="menu-title"
                              data-i18n="nav.templates.main"> {{ __('keywords.shippping') }} </span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.countries.index') }}"
                                  data-i18n="">{{ __('keywords.shippping') }}</a>
                          </li>

                      </ul>
                  </li>
              @endcan

              @can('settings')
                  <li class=" nav-item"><a href="#"><i class="la la-cog"></i><span class="menu-title"
                              data-i18n="nav.templates.main"> {{ __('keywords.settings') }} </span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.settings.show', $setting->id) }}"
                                  data-i18n="">{{ __('keywords.settings') }}</a>
                          </li>

                      </ul>
                  </li>
              @endcan

              @can('contacts')
                                    <li class=" nav-item"><a href="#"><i class="la la-envelope"></i><span class="menu-title"
                              data-i18n="nav.templates.main"> {{ __('keywords.contacts') }} </span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="{{ route('admin.contacts.index') }}"
                                  data-i18n="">{{ __('keywords.contacts') }}</a>
                          </li>

                      </ul>
                  </li>
              @endcan


              {{-- <x-has-access permission="roles" > --}}

              {{-- </x-has-access > --}}
          </ul>
      </div>
  </div>
