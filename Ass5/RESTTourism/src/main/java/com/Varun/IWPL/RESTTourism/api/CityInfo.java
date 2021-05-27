package com.Varun.IWPL.RESTTourism.api;

import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;

import com.google.gson.Gson;

@Path("/citySpots")
public class CityInfo {
	final static private Map<String, List<String>> cityDict;
	static {
		cityDict = new HashMap<String, List<String>>();
		cityDict.put("Mumbai", Arrays.asList("Elephanta Caves", "Marine Drive", "Juhu Beach"));
		cityDict.put("Paris", Arrays.asList("Eiffel Tower", "The Louvre", "Notre Dame"));
		cityDict.put("New York", Arrays.asList("Central Park", "Long Island", "Niagara Falls"));
	}
	private static Boolean ifCityExists(String city){
		return cityDict.containsKey(city);
	}
	private static List<String> getSpotsList(String city) {
		return cityDict.get(city);
	}
	
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public static String getCitySpots(@QueryParam("city") String city) {
		CitySpots packet = new CitySpots();
		packet.status = ifCityExists(city); 
		if(packet.status) {
			List<String> spots = getSpotsList(city);
			packet.status = true;
			packet.city = city;
			packet.spots = spots;
		}
		Gson gson = new Gson();
		return gson.toJson(packet);
	}
}

class CitySpots{
	Boolean status;
	String city;
	List<String> spots;
}