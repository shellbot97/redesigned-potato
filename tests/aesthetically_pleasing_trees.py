# ref: https://stackoverflow.com/questions/62392510/find-and-format-visually-aesthetically-pleasant-pattern-of-trees-in-a-forest-usi


def solution(arr):
    res_count = 0
    if(check_trees(arr)):
        return 1
    for i in range(0, len(arr)):
        if(check_trees(arr[:i]+arr[i+1:])):
            res_count +=1
    if(res_count == 0):
        return -1
    else:
        return res_count
    
def check_trees(arr):
    for i in range(0, len(arr)-2):
        if((arr[i] - arr[i+1] > 0) and (arr[i+1]-arr[i+2] > 0)) or ((arr[i] - arr[i+1] < 0) and (arr[i+1]-arr[i+2] < 0)):
            return False
    return True
    
    
print(solution([3, 4, 5, 3, 7]))
