# ref: https://www.tutorialspoint.com/insert-5-to-make-number-largest-in-python

def solution(N):
    string_number = str(N)
    
    if string_number[0] == "-":
        result = "-"+"5"+string_number.replace("-", "")
    else:
        result = 0
        
    for i in range(len(string_number) + 1):
        if(string_number[0] == "-"):
            continue
        new_number = int(string_number[:i] + '5' + string_number[i:])
        result = max(new_number, int(result))
    return result

def solution2(N):
    string_number = str(N)
    
    if string_number[0] == "-":
        result = "-5"+string_number.replace("-", "")
    else:
        result = 0
        
    for i in range(len(string_number)):
        if(string_number[i] != "-"):
            new_number = int(string_number[:i] + '5' + string_number[i:])
            result = max(new_number, int(result))
    return result

print(solution(-999))
