<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
      <tr><td> Report {{$start_date}} to {{$end_date}}<td></tr>
    </table>

    <table class="table table-bordered">
      @for ($count = 0; $count < count($output); $count++)
        <tr>
          <td>
            {{$output[$count][0]}}
          </td>
          <td>
            {{$output[$count][1]}}
          </td>
          <td>
            {{$output[$count][2]}}
          </td>
          <td>
            {{$output[$count][3]}}
          </td>
          <td>
            {{$output[$count][4]}}
          </td>
        </tr>
      @endfor
    </table>
  </body>
</html>