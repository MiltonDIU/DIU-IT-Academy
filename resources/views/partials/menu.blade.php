<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.settings.edit") }}" class="nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            {{ trans('cruds.setting.title') }}
                        </a>
                    </li>
                @endcan

                @can('courses_seeting_access')
                    <li class="nav-item has-treeview
                    {{ request()->is("admin/course-categories*") ? "menu-open" : "" }}
                    {{ request()->is("admin/skills-covereds*") ? "menu-open" : "" }}
                    {{ request()->is("admin/required-skills*") ? "menu-open" : "" }}
                    {{ request()->is("admin/lesson-types*") ? "menu-open" : "" }}
                    {{ request()->is("admin/course-content-types*") ? "menu-open" : "" }}
                    {{ request()->is("admin/courses*") ? "menu-open" : "" }}
                    {{ request()->is("admin/lessons*") ? "menu-open" : "" }}
                    ">

                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-user-graduate">
                            </i>
                            <p>
                                {{ trans('cruds.coursesSeeting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                    @can('course_category_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.course-categories.index") }}" class="nav-link {{ request()->is("admin/course-categories") || request()->is("admin/course-categories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.courseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('skills_covered_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.skills-covereds.index") }}" class="nav-link {{ request()->is("admin/skills-covereds") || request()->is("admin/skills-covereds/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.skillsCovered.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('required_skill_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.required-skills.index") }}" class="nav-link {{ request()->is("admin/required-skills") || request()->is("admin/required-skills/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.requiredSKill.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lesson_type_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.lesson-types.index") }}" class="nav-link {{ request()->is("admin/lesson-types") || request()->is("admin/lesson-types/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.lessonType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_content_type_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.course-content-types.index") }}" class="nav-link {{ request()->is("admin/course-content-types") || request()->is("admin/course-content-types/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.courseContentType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('lesson_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.lessons.index") }}" class="nav-link {{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-list-ul nav-icon">

                                </i>
                                {{ trans('cruds.lesson.title') }}
                            </a>
                        </li>
                    @endcan
                        </ul>
                    </li>
                @endcan




                @can('menu_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/positions*") ? "c-show" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-caret-down">
                            </i>
                            <p>
                                {{ trans('cruds.menuManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('position_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.positions.index") }}" class="nav-link {{ request()->is("admin/positions") || request()->is("admin/positions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.position.title') }}
                                        </p>

                                    </a>
                                </li>
                            @endcan
                            @can('menu_access')
                                    <li class="nav-item">
                                    <a href="{{ route("admin.menus.index") }}" class="nav-link {{ request()->is("admin/menus") || request()->is("admin/menus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.menu.title') }}
                                        </p>

                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('article_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/article-categories*") ? "c-show" : "" }} {{ request()->is("admin/articles*") ? "c-show" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">
                            </i>
                            <p>
                                {{ trans('cruds.articleManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('article_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.article-categories.index") }}" class="nav-link {{ request()->is("admin/article-categories") || request()->is("admin/article-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw fas fa-cogs nav-icon">

                                        </i>
                                        <p>
                                            {{ trans('cruds.articleCategory.title') }}
                                        </p>

                                    </a>
                                </li>
                            @endcan
                            @can('article_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.articles.index") }}" class="nav-link {{ request()->is("admin/articles") || request()->is("admin/articles/*") ? "active" : "" }}">
                                        <i class="fa-fw fas fa-cogs nav-icon">

                                        </i>
                                       <p>
                                           {{ trans('cruds.article.title') }}
                                       </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('slider_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-cogs nav-icon">
                            </i>
                            Sliders
                        </a>
                    </li>
                @endcan
                @can('partner_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.partners.index") }}" class="nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.partner.title') }}
                        </a>
                    </li>
                @endcan
                @can('testimonial_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.testimonials.index") }}" class="nav-link {{ request()->is("admin/testimonials") || request()->is("admin/testimonials/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.testimonial.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('contact_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.contacts.index") }}" class="nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.contact.title') }}
                        </a>
                    </li>
                @endcan
                @can('team_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.team.title') }}
                        </a>
                    </li>
                @endcan
                @can('social_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.socials.index") }}" class="nav-link {{ request()->is("admin/socials") || request()->is("admin/socials/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.social.title') }}
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                        <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
