package api;

import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class CityInfo {
	final static private Map<String, List<String>> cityDict;
	static {
		cityDict = new HashMap<String, List<String>>();
		cityDict.put("Mumbai", Arrays.asList("Elephanta Caves", "Marine Drive", "Juhu Beach"));
		cityDict.put("Paris", Arrays.asList("Eiffel Tower", "The Louvre", "Notre Dame"));
		cityDict.put("New York", Arrays.asList("Central Park", "Long Island", "Niagara Falls"));
	}
	public static Boolean ifCityExists(String city){
		return cityDict.containsKey(city);
	}
	public static List<String> getCitySpots(String city) {
		return cityDict.get(city);
	}
}
