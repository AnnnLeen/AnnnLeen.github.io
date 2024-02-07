# В-2 17. Дан целочисленный массив. Необходимо найти количество элементов между первым и последним минимальным.

def elements_between(arr):
    min = arr[0]  
    for i in range(1, len(arr)):
        if arr[i] < min:
            min = arr[i]
    first_min_index = arr.index(min)
    last_min_index = len(arr) - 1 - arr[::-1].index(min)
    if first_min_index != last_min_index:
        k = abs(first_min_index - last_min_index) - 1
        return k
    else:
        return 0

arr = input("Введите целочисленный массив через пробел: ")
arr = arr.split()
arr = [int(num) for num in arr]
result = elements_between(arr)
print(result)
