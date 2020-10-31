<script type="text/javascript">
        var allbox = document.getElementById('all');
        var boxes = document.getElementsByName('id[]');
        var delbox = document.getElementById('field').getElementsByTagName('th');
        objectHV(
          [],
          [delbox[8]]
        );
        var checked = 0;
        for(var i=0;i<boxes.length; i++) {
          boxes[i].addEventListener('change', (e) => {
            if(e.target.checked) {
              checked++;
              if(checked == 15) {
                allbox.checked = true;
              }
              objectHV(
                [delbox[8]],
                [delbox[1], delbox[2], delbox[3], delbox[4],delbox[5],delbox[6],delbox[7]]
              );
            }
            else {
              checked--;
              if(allbox.checked) {
                allbox.checked = false;
              }
              if(checked <= 0) {
                objectHV(
                  [delbox[1], delbox[2], delbox[3], delbox[4],delbox[5],delbox[6],delbox[7]],
                  [delbox[8]]
                );
              }
            }
            delbox[8].getElementsByTagName('span')[0].innerText = checked + '개 선택됨.';
          });
        }
        allbox.addEventListener('change', (e) => {
          if(e.target.checked) {
            for(var i=0; i<boxes.length; i++) {
              boxes[i].checked = true;
            }
            checked = boxes.length;
            objectHV(
              [delbox[8]],
              [delbox[1], delbox[2], delbox[3], delbox[4],delbox[5],delbox[6],delbox[7]]
            );
          }
          else {
            for(var i=0; i<boxes.length; i++) {
              boxes[i].checked = false;
            }
            checked = 0;
            objectHV(
              [delbox[1], delbox[2], delbox[3], delbox[4],delbox[5],delbox[6],delbox[7]],
              [delbox[8]]
            );
          }
          delbox[8].getElementsByTagName('span')[0].innerText = checked + '개 선택됨.';
        });

        function objectHV(visible, invisible) {
          for(var i=0; i<visible.length; i++) {
            visible[i].style.display = '';
          }
          for(var i=0; i<invisible.length; i++) {
            invisible[i].style.display = 'none';
          }
        }
</script>
