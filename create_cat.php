<?
include 'connect.php';
include 'header.php';

?>
<tr>
    <td class="leftpart">
        <h3>
            <a href="category.php?id=">Category name</a>
        </h3> Category description goes here
    </td>
    <td class='rightpart'>
        <a href="topic.php?id=">Topic subject</a> at 10-10
    </td>
</tr>

<form method='post' action=''>
   Category name: <input type='text' name='cat_name' />
   Category description: <textarea name="cat_description" /></textarea>
   <input type='submit' value='Add category' />
</form>

<?
include 'footer.php'
?>