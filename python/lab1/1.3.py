# В-2 1.3. Найти делитель числа, являющийся взаимно простым с суммой цифр данного числа

n = int(input("Введите число: "))

def summa(n):
    sum = 0
    while n > 0:
        cifra = n % 10
        sum = sum + cifra
        n = n // 10
    return sum

summa_cifr = summa(n)

def NOD(a, b):
    while b!=0:
        a, b = b, a % b
    return a
def prostoe(a, b):
    return NOD(a, b) == 1

def delitel(n):
    k=0
    for i in range(2, n):
        if prostoe(n, i):
            k=i
            break
    return k

result = delitel(summa_cifr)
print(result)
