def soalNomor2(input):
  
  i = 0
  angka = input

  while i < angka-2:
    print('-', end ="")
    i+=1
    
  print('panjang', end ="")

  i=0
  while i < angka-2:
    print('-', end ="")
    i+=1

  print('')

  for b in range(0,angka):
    
    if (b == angka/2-0.5):
      for c in range(0, angka):
        print('*', end="  ")
    
    else:
      for c in range(0, angka):
        if (c == 0 or c-angka+1 == 0):
          print('*', end="  ")
        else:
          print('=', end="  ")

    print('')
  
soalNomor2(5)