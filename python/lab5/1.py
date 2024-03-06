# Реализовать функцию, которая будет проверять, является ли введённая строка IP-адресом (v4).
# Возвращаемое значение True или False. Использовать регулярные выражение. 
# Дополнительно реализовать функцию, которая выбрасывает исключение о некорректном аргументе,
# иначе возвращает IP-адрес (v4). 

import re

def is_valid_ipv4(ip):
    pattern = re.compile(r'^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$')
    if pattern.match(ip):
        return True
    return False

def validate_ip(ip):
    if not is_valid_ipv4(ip):
        raise ValueError("Некорректный IP-адрес")

    return ip

ip_address = "192.168.1.1"
if is_valid_ipv4(ip_address):
    print(f"{ip_address} - это корректный IP-адрес")
else:
    print(f"{ip_address} - это некорректный IP-адрес")

try:
    ip = validate_ip("256.10.1.1")
    print(f"Проверка прошла успешно: {ip}")
except ValueError as e:
    print(f"Ошибка: {e}")
