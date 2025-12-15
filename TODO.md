# TODO List for Implementing Edit and Delete Buttons for Categories

## Completed Tasks
- [x] Update CategoriesController.php to include ver_categorias, ver, actualizar, eliminar methods
- [x] Update category.js to use CategoriesController.php for all fetch calls (including registrarCategoria)
- [x] Verify category.php has the correct table structure with buttons
- [x] Verify edit-category.php has the correct form

## Debugging Steps (since functionality not working)
- [ ] Check browser console for JavaScript errors
- [ ] Check network tab to see if AJAX requests are being sent to correct URLs
- [ ] Verify base_url is defined correctly in the JavaScript
- [ ] Check PHP error logs for any server-side errors
- [ ] Test if CategoriesController.php is accessible via direct URL
- [ ] Ensure database table 'categoria' exists and has correct structure
- [ ] Verify Conexion class is working properly

## Followup Steps
- [ ] Test the functionality by accessing the category page and trying register/edit/delete operations
- [ ] Ensure proper error handling and user feedback
