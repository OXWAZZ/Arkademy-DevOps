import numpy as np

def soalNomor1(input):
  num = input
  i = np.array([int(i) for i in str(num)])

  coba = np.split(i, np.where(i == 0)[0])

  i = 0
  while i < len(coba):
    coba[i].sort()
    i += 1

  coba2 = np.concatenate((coba[0:len(coba)]),axis=0).tolist()

  coba3 = [x for x in coba2 if x != 0]

  print("".join(str(a) for a in coba3))

soalNomor1(5956560159466056)







