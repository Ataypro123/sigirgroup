<?php

Route::namespace('Admin')->group(function(){

    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\LoginController@login')->name('admin.login.submit');
    Route::post('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){

        Route::get('/', 'PagesController@index')->name('admin.index');

        Route::group(['prefix' => 'instructions'], function(){
            Route::get('/', 'InstructionsController@index')->name('instruction.index');
            Route::get('/create', 'InstructionsController@create')->name('instruction.create');
            Route::put('/store', 'InstructionsController@store')->name('instruction.store');
            Route::group(['prefix' => '{instruction}'], function(){
                Route::get('edit', 'InstructionsController@edit')->name('instruction.edit');
                Route::post('edit', 'InstructionsController@update')->name('instruction.update');
                Route::delete('delete', 'InstructionsController@delete')->name('instruction.delete');
            });
        });

        Route::group(['prefix' => 'categories'], function(){
            Route::get('/', 'CategoriesController@index')->name('category.index');
            Route::get('/create', 'CategoriesController@create')->name('category.create');
            Route::put('/store', 'CategoriesController@store')->name('category.store');
            Route::group(['prefix' => '{category}'], function(){
                Route::get('edit', 'CategoriesController@edit')->name('category.edit');
                Route::post('edit', 'CategoriesController@update')->name('category.update');
                Route::delete('delete', 'CategoriesController@delete')->name('category.delete');
            });
        });

        Route::group(['prefix' => 'subcategories'], function(){
            Route::get('/', 'SubcategoriesController@index')->name('subcategory.index');
            Route::get('/create', 'SubcategoriesController@create')->name('subcategory.create');
            Route::put('/store', 'SubcategoriesController@store')->name('subcategory.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'SubcategoriesController@edit')->name('subcategory.edit');
                Route::post('edit', 'SubcategoriesController@update')->name('subcategory.update');
                Route::delete('delete', 'SubcategoriesController@delete')->name('subcategory.delete');
            });
        });

        Route::group(['prefix' => 'files'], function(){
            Route::get('/', 'FilesController@index')->name('files.index');
            Route::get('/create', 'FilesController@create')->name('files.create');
            Route::put('/store', 'FilesController@store')->name('files.store');
            Route::get('/ajax/{category_id}', 'FilesController@GetSubcategory')->name('ajax.subcategory');
            Route::get('/disciplines/ajax/{subcategory_id}', 'FilesController@GetTerm')->name('ajax.term');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'FilesController@edit')->name('files.edit');
                Route::post('edit', 'FilesController@update')->name('files.update');
                Route::delete('delete', 'FilesController@delete')->name('files.delete');
            });
        });

        Route::group(['prefix' => 'terms'], function(){
            Route::get('/', 'TermsController@index')->name('terms.index');
            Route::get('/create', 'TermsController@create')->name('terms.create');
            Route::put('/store', 'TermsController@store')->name('terms.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'TermsController@edit')->name('terms.edit');
                Route::post('edit', 'TermsController@update')->name('terms.update');
                Route::delete('delete', 'TermsController@delete')->name('terms.delete');
            });
        });

        Route::group(['prefix' => 'disciplines'], function(){
            Route::get('/', 'DisciplinesController@index')->name('disciplines.index');
            Route::get('/create', 'DisciplinesController@create')->name('disciplines.create');
            Route::put('/store', 'DisciplinesController@store')->name('disciplines.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'DisciplinesController@edit')->name('disciplines.edit');
                Route::post('edit', 'DisciplinesController@update')->name('disciplines.update');
                Route::delete('delete', 'DisciplinesController@delete')->name('disciplines.delete');
            });
        });

        Route::group(['prefix' => 'students'], function(){
            Route::get('/', 'StudentsController@index')->name('student.index');
            Route::get('/create', 'StudentsController@create')->name('student.create');
            Route::put('/store', 'StudentsController@store')->name('student.store');
            Route::group(['prefix' => '{student}'], function(){
                Route::get('edit', 'StudentsController@edit')->name('student.edit');
                Route::post('edit', 'StudentsController@update')->name('student.update');
                Route::delete('delete', 'StudentsController@delete')->name('student.delete');
            });
        });

        Route::group(['prefix' => 'studentContents'], function(){
            Route::get('/', 'StudentContentsController@index')->name('studentContent.index');
            Route::get('/create', 'StudentContentsController@create')->name('studentContent.create');
            Route::put('/store', 'StudentContentsController@store')->name('studentContent.store');
            Route::put('/store2', 'StudentContentsController@store2')->name('studentContent.store2');
            Route::put('/store3', 'StudentContentsController@store3')->name('studentContent.store3');
            Route::group(['prefix' => '{studentContent}'], function(){
                Route::get('edit', 'StudentContentsController@edit')->name('studentContent.edit');
                Route::post('edit', 'StudentContentsController@update')->name('studentContent.update');
                Route::delete('delete', 'StudentContentsController@delete')->name('studentContent.delete');
            });
        });

        Route::group(['prefix' => 'charts'], function(){
            Route::get('/', 'ChartsController@index')->name('chart.index');
            Route::get('/create', 'ChartsController@create')->name('chart.create');
            Route::put('/store', 'ChartsController@store')->name('chart.store');
            Route::group(['prefix' => '{chart}'], function(){
                Route::get('edit', 'ChartsController@edit')->name('chart.edit');
                Route::post('edit', 'ChartsController@update')->name('chart.update');
                Route::delete('delete', 'ChartsController@delete')->name('chart.delete');
            });
        });

        Route::group(['prefix' => 'chartContents'], function(){
            Route::get('/', 'ChartContentsController@index')->name('chartContent.index');
            Route::get('/create', 'ChartContentsController@create')->name('chartContent.create');
            Route::put('/store', 'ChartContentsController@store')->name('chartContent.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'ChartContentsController@edit')->name('chartContent.edit');
                Route::post('edit', 'ChartContentsController@update')->name('chartContent.update');
                Route::delete('delete', 'ChartContentsController@delete')->name('chartContent.delete');
            });
        });

        Route::group(['prefix' => 'chartMaterials'], function(){
            Route::get('/', 'ChartMaterialsController@index')->name('chartMaterial.index');
            Route::get('/create', 'ChartMaterialsController@create')->name('chartMaterial.create');
            Route::post('select-ajax', 'ChartMaterialsController@selectAjax')->name('select-ajax');
            Route::put('/store', 'ChartMaterialsController@store')->name('chartMaterial.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'ChartMaterialsController@edit')->name('chartMaterial.edit');
                Route::post('edit', 'ChartMaterialsController@update')->name('chartMaterial.update');
                Route::put('edit', 'ChartMaterialsController@update2')->name('chartMaterial.update2');
                Route::delete('delete', 'ChartMaterialsController@delete')->name('chartMaterial.delete');
            });
        });

        Route::group(['prefix' => 'photoCategories'], function(){
            Route::get('/', 'PhotoCategoriesController@index')->name('photoCategory.index');
            Route::get('/create', 'PhotoCategoriesController@create')->name('photoCategory.create');
            Route::put('/store', 'PhotoCategoriesController@store')->name('photoCategory.store');
            Route::group(['prefix' => '{photoCategory}'], function(){
                Route::get('edit', 'PhotoCategoriesController@edit')->name('photoCategory.edit');
                Route::post('edit', 'PhotoCategoriesController@update')->name('photoCategory.update');
                Route::delete('delete', 'PhotoCategoriesController@delete')->name('photoCategory.delete');
            });
        });

        Route::group(['prefix' => 'photoSubcategories'], function(){
            Route::get('/', 'PhotoSubcategoriesController@index')->name('photoSubcategory.index');
            Route::get('/create', 'PhotoSubcategoriesController@create')->name('photoSubcategory.create');
            Route::put('/store', 'PhotoSubcategoriesController@store')->name('photoSubcategory.store');
            Route::group(['prefix' => '{photoSubcategory}'], function(){
                Route::get('edit', 'PhotoSubcategoriesController@edit')->name('photoSubcategory.edit');
                Route::post('edit', 'PhotoSubcategoriesController@update')->name('photoSubcategory.update');
                Route::delete('delete', 'PhotoSubcategoriesController@delete')->name('photoSubcategory.delete');
            });
        });

        Route::group(['prefix' => 'photos'], function () {
            Route::group(['prefix' => '{photo}'], function () {
                Route::delete('delete', 'DepartmentUploadsController@photo')->name('photo.delete');
            });
        });

        Route::group(['prefix' => 'blocks'], function(){
            Route::get('/', 'BlocksController@index')->name('block.index');
            Route::get('/create', 'BlocksController@create')->name('block.create');
            Route::put('/store', 'BlocksController@store')->name('block.store');
            Route::group(['prefix' => '{block}'], function(){
                Route::get('edit', 'BlocksController@edit')->name('block.edit');
                Route::post('edit', 'BlocksController@update')->name('block.update');
                Route::delete('delete', 'BlocksController@delete')->name('block.delete');
            });
        });

        Route::group(['prefix' => 'teams'], function(){
            Route::get('/', 'TeamsController@index')->name('team.index');
            Route::get('/create', 'TeamsController@create')->name('team.create');
            Route::put('/store', 'TeamsController@store')->name('team.store');
            Route::group(['prefix' => '{team}'], function(){
                Route::get('edit', 'TeamsController@edit')->name('team.edit');
                Route::post('edit', 'TeamsController@update')->name('team.update');
                Route::delete('delete', 'TeamsController@delete')->name('team.delete');
            });
        });

        Route::group(['prefix' => 'subMenus'], function(){
            Route::get('/', 'SubMenusController@index')->name('subMenu.index');
            Route::get('/create', 'SubMenusController@create')->name('subMenu.create');
            Route::put('/store', 'SubMenusController@store')->name('subMenu.store');
            Route::group(['prefix' => '{subMenu}'], function(){
                Route::get('edit', 'SubMenusController@edit')->name('subMenu.edit');
                Route::post('edit', 'SubMenusController@update')->name('subMenu.update');
                Route::delete('delete', 'SubMenusController@delete')->name('subMenu.delete');
            });
        });

        Route::group(['prefix' => 'admins'], function(){
            Route::get('/', 'AdminsController@index')->name('administrator.index');
            Route::get('/create', 'AdminsController@create')->name('administrator.create');
            Route::put('/store', 'AdminsController@store')->name('administrator.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'AdminsController@edit')->name('administrator.edit');
                Route::post('edit', 'AdminsController@update')->name('administrator.update');
                Route::delete('delete', 'AdminsController@delete')->name('administrator.delete');
            });
        });

        Route::group(['prefix' => 'sliders'], function(){
            Route::get('/', 'SlidersController@index')->name('slider.index');
            Route::get('/create', 'SlidersController@create')->name('slider.create');
            Route::put('/store', 'SlidersController@store')->name('slider.store');
            Route::group(['prefix' => '{slider}'], function(){
                Route::get('edit', 'SlidersController@edit')->name('slider.edit');
                Route::post('edit', 'SlidersController@update')->name('slider.update');
                Route::delete('delete', 'SlidersController@delete')->name('slider.delete');
            });
        });

        Route::group(['prefix' => 'blogs'], function(){
            Route::get('/', 'BlogsController@index')->name('blog.index');
            Route::get('/create', 'BlogsController@create')->name('blog.create');
            Route::put('/store', 'BlogsController@store')->name('blog.store');
            Route::group(['prefix' => '{blog}'], function(){
                Route::get('edit', 'BlogsController@edit')->name('blog.edit');
                Route::post('edit', 'BlogsController@update')->name('blog.update');
                Route::delete('delete', 'BlogsController@delete')->name('blog.delete');
            });
        });

        Route::group(['prefix' => 'fiitBlogs'], function(){
            Route::get('/', 'FiitBlogsController@index')->name('fiitBlog.index');
            Route::get('/create', 'FiitBlogsController@create')->name('fiitBlog.create');
            Route::put('/store', 'FiitBlogsController@store')->name('fiitBlog.store');
            Route::group(['prefix' => '{fiitBlog}'], function(){
                Route::get('edit', 'FiitBlogsController@edit')->name('fiitBlog.edit');
                Route::post('edit', 'FiitBlogsController@update')->name('fiitBlog.update');
                Route::delete('delete', 'FiitBlogsController@delete')->name('fiitBlog.delete');
            });
        });

        Route::group(['prefix' => 'departments'], function(){
            Route::get('/', 'DepartmentsController@index')->name('department.index');
            Route::get('/create', 'DepartmentsController@create')->name('department.create');
            Route::put('/store', 'DepartmentsController@store')->name('department.store');
            Route::group(['prefix' => '{department}'], function(){
                Route::get('edit', 'DepartmentsController@edit')->name('department.edit');
                Route::post('edit', 'DepartmentsController@update')->name('department.update');
                Route::delete('delete', 'DepartmentsController@delete')->name('department.delete');
            });
        });

        Route::group(['prefix' => 'programs'], function(){
            Route::get('/', 'ProgramsController@index')->name('programs.index');
            Route::get('/create', 'ProgramsController@create')->name('programs.create');
            Route::put('/store', 'ProgramsController@store')->name('programs.store');
            Route::group(['prefix' => '{id}'], function(){
                Route::get('edit', 'ProgramsController@edit')->name('programs.edit');
                Route::post('edit', 'ProgramsController@update')->name('programs.update');
                Route::delete('delete', 'ProgramsController@delete')->name('programs.delete');
            });
        });

        Route::group(['prefix' => 'teamDepartments'], function(){
            Route::get('/', 'TeamDepartmentsController@index')->name('teamDepartment.index');
            Route::get('/create', 'TeamDepartmentsController@create')->name('teamDepartment.create');
            Route::put('/store', 'TeamDepartmentsController@store')->name('teamDepartment.store');
            Route::group(['prefix' => '{teamDepartment}'], function(){
                Route::get('edit', 'TeamDepartmentsController@edit')->name('teamDepartment.edit');
                Route::post('edit', 'TeamDepartmentsController@update')->name('teamDepartment.update');
                Route::delete('delete', 'TeamDepartmentsController@delete')->name('teamDepartment.delete');
            });
        });

        Route::group(['prefix' => 'departmentUploads'], function () {
            Route::group(['prefix' => '{departmentUpload}'], function () {
                Route::delete('delete', 'DepartmentUploadsController@delete')->name('departmentUpload.delete');
            });
        });

        Route::group(['prefix' => 'knuUploads'], function () {
            Route::group(['prefix' => '{knuUpload}'], function () {
                Route::delete('delete', 'DepartmentUploadsController@knu')->name('knuUpload.delete');
            });
        });

        Route::group(['prefix' => 'fiitUploads'], function () {
            Route::group(['prefix' => '{fiitUpload}'], function () {
                Route::delete('delete', 'DepartmentUploadsController@fiit')->name('fiitUpload.delete');
            });
        });

    });
});

Auth::routes();
Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/contact', 'ContactsController@index')->name('pages.contact');

Route::get('/facultet', 'DepartmentsController@index')->name('pages.department');
Route::get('/facultet/instrukcia', 'DepartmentsController@instruction')->name('pages.department.instruction');
Route::get('/facultet/rukovodstvo', 'DepartmentsController@guide')->name('pages.department.guide');
Route::get('/facultet/ychebnyi-process', 'DepartmentsController@process')->name('pages.department.process');
Route::get('/facultet/ychebnyi-process/{chart}', 'DepartmentsController@chart')->name('pages.department.chart');
Route::get('/facultet/ychebnyi-process/{chart}/{chartMaterial}', 'DepartmentsController@chartMaterial')->name('pages.department.chartMaterial');
Route::get('/facultet/{subMenu}', 'DepartmentsController@subMenu')->name('pages.department.subMenu');

Route::get('/fotogalereya/{photoCategory}', 'PhotosController@show')->name('pages.photos.show');
Route::get('/studencheskaya-jizn/{student}', 'PhotosController@student')->name('pages.photos.student');


Route::get('/kafedry', 'DepartmentsController@department')->name('pages.department.faculty');
Route::get('/kafedry/osnovnaya-obrazovatelnaya-programma', 'DepartmentsController@programs')->name('pages.department.programs');
Route::get('/kafedry/osnovnaya-obrazovatelnaya-programma/{department}', 'DepartmentsController@program')->name('pages.department.program');
Route::get('/kafedry/{department}', 'DepartmentsController@show')->name('pages.department.show');

Route::get('/news', 'BlogsController@index')->name('pages.blog');
Route::get('/news/knu', 'BlogsController@knu')->name('pages.blog.knu');
Route::get('/news/knu/{blog}', 'BlogsController@showKnu')->name('pages.blog.knu.show');
Route::get('/news/fiit', 'BlogsController@fiit')->name('pages.blog.fiit');
Route::get('/news/fiit/{fiitBlog}', 'BlogsController@showFiit')->name('pages.blog.fiit.show');

Route::get('/ych-programmy/{slug}', 'CategoriesController@category')->name('pages.category');
Route::get('/ych-programmy/{slug}/{id}', 'CategoriesController@subCategory')->name('pages.subCategory');
