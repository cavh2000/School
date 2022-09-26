/*
Vargas Hernández Carlo Ariel 
2CM13
Practica final
Mininapster
18/06/2021
Programacion orientada a objetos
*/
package mininapster.ClassesClient;

import java.net.*;
import java.io.*;
import java.util.ArrayList;
import mininapster.MyObject.Song;

public class sendSongsData implements Runnable, Serializable{
    
    private Socket socket;
    private ObjectOutputStream output;
    private ObjectInputStream input;
    private Thread thread;
    private String host = "localhost";
    private int port = 7000;
    
    private ArrayList<Song> arraySongs;
    
    public sendSongsData(ArrayList<Song> arraySongs){
        System.out.println("sendSongsData constructor starts!!! ");
        this.arraySongs = arraySongs;
        try{
            thread = new Thread(this);
            socket = new Socket(host, port);
            output = new ObjectOutputStream(socket.getOutputStream());
            input = new ObjectInputStream(socket.getInputStream());
            thread.start();
        } catch (IOException e) {
            System.err.println("sendSongsData constructor IOException");
            e.printStackTrace();
        } catch (Exception e) {
            System.err.println("sendSongsData constructor Exception");
            e.printStackTrace();
        }
    }
    
    @Override
    public void run(){
        System.out.println("sendSongsData.java run method Starts!!!");
        try{
            output.writeObject(arraySongs);
        } catch (IOException e) {
            System.err.println("sendSongsData.java run method IOException");
            e.printStackTrace();
        } catch (Exception e) {
            System.err.println("sendSongsData.java run method Exception");
            e.printStackTrace();
        }
    }
}