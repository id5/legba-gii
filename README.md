#### legba-gii - About

An extension of gii generator that brings several improvements.

In all views, the button panel is more complete, including print button on all screens, list all and filter (for togglet form filters) and form better sized filters.

In view form, generations 1: 1 and 1: n (with viaTable ()) are displayed in selectbox (1: 1) or chackbox set (1: n with viaTable ()) making the work of the smartest CRUD and abstracting any refactoring to do so.

In the controls, the delete of methods were treated for exeções and not generate error 500 and stop running. In addition, in the create, update, delete are set flash messages about success or failure of action (which can be used to display the template main).

In the models for each relationship are created beyond getRelName () the getAllRelName () that behind all the list of entities that can be related to it (collection of active objects record of the relationship type). To facilitate the construction of views, is created getAllDataListRelName () that generates a list of the type key => value utility to popular forms, and is used to generate the improvements of relaciomaneto in views already described above.

#### legba-gii - Install

First clone (or fork / clone) git repository to your workplace, or if you prefer, download one of our releases in https://github.com/id5/legba-gii/releases

The location where the files should be (clone or download previous step) of legba-gii should be @ app / vendors / legba-gii

To enable the ability to generate the legba-gii templates, you must configure your application, then editer if u @ file app / conf / web.php and node to configure the gii, add:

;) OK! Ready!

Now to access the gii normally, and choose to generate CRUD, modules or templates in the selectbox TEMPLATE SET you can choose between standard generate (default option) or generate the legba-gii advanced (Legba Gii option)

Abuse this, and contribute!!!
