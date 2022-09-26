/*
Vargas Hernández Carlo Ariel 
2CM13
Practica final
Mininapster
18/06/2021
Programacion orientada a objetos
*/
package mininapster.ClassesNapsterServer;

import java.net.*;
import java.io.*;
import mininapster.MyObject.User;

public class deleteUserServer implements Serializable{
    
    public static void main (String args[]){
        System.out.println("deleteUserServer main method Starts!!!");
        ServerSocket serverSocket;
        Socket socket;
        ObjectInputStream input;
        ObjectOutputStream output;
        int port = 5502;
        try{
            serverSocket = new ServerSocket(port);
            System.out.println("deleteUserServer: Waiting for a connection...");
            while(true) {
                socket = serverSocket.accept();
                System.out.println("deleteUserServer: Client connected");
                input = new ObjectInputStream(socket.getInputStream());
                output = new ObjectOutputStream(socket.getOutputStream());
                User newUser = (User)input.readObject();
                newUser.setIpAddress(((socket.getLocalAddress().toString()).replace((char)47, ' ')).replaceAll("\\s+", ""));
                new ServerDB().deleteUser(newUser);
                output.writeObject("Server says: User deleted!");
                socket.close();
            }
        } catch (IOException e) {
            System.err.println("run method, deleteUserServer class, IOException");
            e.printStackTrace();
        } catch (Exception e) {
            System.err.println("run method, deleteUserServer class, Exception");
            e.printStackTrace();
        }
    }
}