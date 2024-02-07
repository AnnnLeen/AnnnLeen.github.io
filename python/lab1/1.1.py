# В-2 1.1. Найти количество чисел, взаимно простых с заданным

n = int(input("Введите число: "))
def NOD(a, b):
    while b!=0:
        a, b = b, a % b
    return a
def prostoe(a, b):
    return NOD(a, b) == 1
def kolvo(n):
    k = 0
    for i in range(1, n):
        if prostoe(n, i):
            k+=1
    return k

result = kolvo(n)

print(result)
