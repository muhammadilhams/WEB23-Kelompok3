function bubbleSort(arr) {
    var n = arr.length;
    var swapped;

    do {
        swapped = false;

        for (var i = 0; i < n - 1; i++) {
          if (arr[i] > arr[i + 1]) {
            // tukar elemen jika mereka tdk dlm urutan yg bnr
            // nilai sementara
            var temp = arr[i];
            // elemen diperbaharui
            arr[i] = arr[i + 1];  
            // diperbaharui dngn nilai yg disimpan di temp
            arr[i + 1] = temp;
            swapped = true;       
          }
        }
    // perulangan brkhr jika tdk ada pertukaran yg di lakukan pd iterasi ini
    } while (swapped);
    return arr;
  }
var n = 5;
var array = [50, 20, 1, 45, 3];

bubbleSort(array);
console.log(array);