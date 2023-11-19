* Description
  This repository contains a demonstration of setting up a basic data exchange between two Symfony services using RabbitMQ.

* Features
  - Two Symfony console commands are implemented to facilitate the exchange of data between the services.
  - SendToService2Command in Service1 sends a message to Service2 via RabbitMQ.
  - ReceiveFromService1Command in Service2 receives the message from Service1 via RabbitMQ and stores it.

* Instructions
  To run the demonstration:

1. Set up RabbitMQ and configure the connection details in the Symfony project.
2. Place the SendToService2Command.php file in the src/Command directory of Service1 and the ReceiveFromService1Command.php file in the src/Command directory of Service2.
3. Execute the commands within each service to observe the data exchange via RabbitMQ.
   
* Repository Structure
  - service1/: Contains the Symfony application for Service1, including the SendToService2Command.
  - service2/: Contains the Symfony application for Service2, including the ReceiveFromService1Command.
  This demonstration serves as a simple example of inter-service communication using RabbitMQ in a Symfony application.
