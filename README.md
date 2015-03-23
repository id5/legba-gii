# legba-gii

An extension of gii generator that brings several improvements.

With this set of advanced templates to extend the standard generation gii in YII2.

Some of the improvements are things:

- In all views, the button panel is more complete, including print button on all screens, list all and filter (for togglet form filters) and form better sized filters.

- In view form, generations 1: 1 and 1: n (with viaTable ()) are displayed in selectbox (1: 1) or chackbox set (1: n with viaTable ()) making the work of the smartest CRUD and abstracting any refactoring to do so.

- In the controls, the delete of methods were treated for exeções and not generate error 500 and stop running. In addition, in the create, update, delete are set flash messages about success or failure of action (which can be used to display the template main).

- In the models for each relationship are created beyond getRelName () the getAllRelName () that behind all the list of entities that can be related to it (collection of active objects record of the relationship type). To facilitate the construction of views, is created getAllDataListRelName () that generates a list of the type key => value utility to popular forms, and is used to generate the improvements of relaciomaneto in views already described above.

