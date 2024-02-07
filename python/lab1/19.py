# В-2 19. Для двух введенных списков L1 и L2 построить новый список, состоящий из элементов, встречающихся только в одном из этих списков и не повторяющихся в них.

def unique_elements(L1, L2):
    unique_list = []
    for i in L1:
        if i not in unique_list and i not in L2:
            unique_list.append(i)
    for i in L2:
        if i not in unique_list and i not in L1:
            unique_list.append(i)
    return unique_list

L1 = list(map(int, input("Введите элементы списка L1 через пробел: ").split()))
L2 = list(map(int, input("Введите элементы списка L2 через пробел: ").split()))
result = unique_elements(L1, L2)
print(result)
