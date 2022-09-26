/*
Vargas Hernández Carlo Ariel 
2CM13
Practica final
Mininapster
18/06/2021
Programacion orientada a objetos
*/
package mininapster.MyObject;

import java.io.Serializable;

public class Request implements Serializable{
    
    private String title, artist, album, genere, user;
    private int maxSize;
    
    public Request(String title, String artist, String album, int maxSize, String genere, String user){
        System.out.println("Request.java " + title + " " + artist + " " + album + " size " + maxSize);
        this.title = title;
        this.artist = artist;
        this.album = album;
        this.maxSize = maxSize;
        this.genere = genere;
        this.user = user;
    }
    
    public String getTitle(){
        return title;
    }
    
    public String getArtist(){
        return artist;
    }
    
    public String getAlbum(){
        return album;
    }
    
    public int getMaxSize(){
        return maxSize;
    }

    public String getGenere() {
        return genere;
    }
    
    public String gerUser(){
        return user;
    }
    
}